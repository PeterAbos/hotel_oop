<?php

namespace App\Routing;

use App\Controllers\HomeController;
use App\Controllers\RoomsController;
use App\Controllers\GuestController;
use App\Controllers\ReservationController;
use App\Views\Display;

class Router
{
    public function handle(): void
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $requestUri = $_SERVER['REQUEST_URI'];

        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        $this->dispatch($method, $requestUri);
    }

    private function dispatch(string $method, string $requestUri): void
    {
        switch($method) {
            case 'GET':
                $this->handleGetRequests($requestUri);
                break;
            case 'POST':
                $this->handlePostRequests($requestUri);
                break;
            case 'PATCH':
                $this->handlePatchRequests($requestUri);
                break;
            case 'DELETE':
                $this->handleDeleteRequests($requestUri);
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    private function handleGetRequests(mixed $requestUri) {
        switch ($requestUri) {
            case '/':
                HomeController::index();
                return;
            case '/rooms':
                $roomsController = new RoomsController();
                $roomsController->index();
                break;
            case '/guests':
                $guestController = new GuestController();
                $guestController->index();
                break;
            case '/reservations':
                $reservationController = new ReservationController();
                $reservationController->index();
                break;
        }
    }
    private function handlePostRequests(mixed $requestUri) {
        $data = $this->filterPostData($_POST);
        $id = $data['id'] ?? null;

        switch ($requestUri) {
            case '/rooms':
                if(!empty($data)) {
                    $roomsController = new RoomsController();
                    $roomsController->save($data);
                }
                break;
            case '/rooms/create':
                $roomsController = new RoomsController();
                $roomsController->create();
                break;
            case '/guests':
                if(!empty($data)) {
                    $guestController = new GuestController();
                    $guestController->save($data);
                }
                break;
            case '/guests/create':
                $guestController = new GuestController();
                $guestController->create();
                break;
            case '/guests/edit':
                $guestController = new GuestController();
                $guestController->edit($id);
                break;
        }
    }
    private function handlePatchRequests(mixed $requestUri) {
        $data = $this->filterPostData($_POST);
        switch($requestUri) {
            case '/guests':
                $id = $data['id'] ?? null;
                $guestController = new GuestController();
                $guestController->update($id, $data);
                break;
        }
    }
    private function handleDeleteRequests(mixed $requestUri) {

    }
    private function methodNotAllowed(): void
    {
        header ($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        Display::message("405 Method Not Allowed");
    }
    private function filterPostData(array $data): array
    {
        // Remove unnecessary keys in a clean and simple way
        $filterKeys = ['_method', 'submit', 'btn-del', 'btn-save', 'btn-edit', 'btn-plus', 'btn-update'];
        return array_diff_key($data, array_flip($filterKeys));
    }
}