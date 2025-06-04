<?php

namespace App\Controllers;
use App\Models\ReservationsModel;
use App\Controllers\RoomsController;
use App\Views\Display;

class ReservationController extends Controller {

    public function __construct()
    {
        $reservations = new ReservationsModel();
        parent::__construct($reservations);
    }

    public function index(): void
    {
        $reservations = $this->model->all(['order_by' => ['date'], 'direction' => ['DESC']]);
        $this->render('reservations/index', ['reservations' => $reservations]);
    }

    public function create(): void
    {
        $rooms = new RoomsController();
        $guests = new GuestController();
        $this->render('reservations/create', ['rooms' => $rooms->model, 'guests' => $guests->model]);
    }
    public function edit(int $id): void
    {
        $reservations = $this->model->find($id);
        if (!$reservations) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A foglalás a megadott azonosítóval: $id nem található.";
            $this->redirect('/reservations');
        }
        
        $rooms = new RoomsController();
        $guests = new GuestController();
        $this->render('reservations/edit', ['reservations' => $reservations, 'rooms' => $rooms->model, 'guests' => $guests->model]);
    }

    public function save(array $data): void
    {
        if (empty($data['date'])) {
            $_SESSION['warning_message'] = "A dátum kötelező mező.";
            $this->redirect('/reservations/create'); // Redirect if input is invalid
        }
        foreach ($this->model->all() as $row) {
            if ($row->room_id == $_POST['room_id']) {
                $existingStart = strtotime($row->date);
                $existingEnd = strtotime($row->date . " +" . ($row->days - 1) . " days");

                $newStart = strtotime($data['date']);
                $newEnd = strtotime($data['date'] . " +" . ($data['days'] - 1) . " days");

                if ($newStart <= $existingEnd && $newEnd >= $existingStart) {
                    $_SESSION['warning_message'] = "Ez a szoba már foglalt ebben az időben!";
                    $this->redirect('/reservations');
                }
            }
        }
        // Use the existing model instance
        $this->model->room_id = $data['room_id'];
        $this->model->guest_id = $data['guest_id'];
        $this->model->days = $data['days'];
        $this->model->date = $data['date'];
        $this->model->create();
        $this->redirect('/reservations');
    }

    public function update(int $id, array $data): void
    {
        $reservations = $this->model->find($id);
        if (!$reservations || empty($data['date'])) {
            // Handle invalid ID or data
            $this->redirect('/reservations');
        }
        foreach ($this->model->all() as $row) {
            if ($row->room_id == $_POST['room_id']) {
                $existingStart = strtotime($row->date);
                $existingEnd = strtotime($row->date . " +" . ($row->days - 1) . " days");

                $newStart = strtotime($data['date']);
                $newEnd = strtotime($data['date'] . " +" . ($data['days'] - 1) . " days");

                if ($newStart <= $existingEnd && $newEnd >= $existingStart) {
                    $_SESSION['warning_message'] = "Ez a szoba már foglalt ebben az időben!";
                    $this->redirect('/reservations');
                }
            }
        }
        $reservations->room_id = $data['room_id'];
        $reservations->guest_id = $data['guest_id'];
        $reservations->days = $data['days'];
        $reservations->date = $data['date'];
        $reservations->update();
        $this->redirect('/reservations');
    }

    function show(int $id): void
    {
        $reservations = $this->model->find($id);
        if (!$reservations) {
            $_SESSION['warning_message'] = "A foglalás a megadott azonosítóval: $id nem található.";
            $this->redirect('/reservations'); // Handle invalid ID
        }
        $this->render('reservations/show', ['reservations' => $reservations]);
    }

    function delete(int $id): void
    {
        $reservations = $this->model->find($id);
        if ($reservations) {
            $result = $reservations->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/reservations'); // Redirect regardless of success
    }
}