<?php

namespace App\Models;

class ReservationsModel extends Model
{
    public int|null $room_id = null;
    public int|null $guest_id = null;
    public int|null $days = null;
    public int|null $date = null;

    protected static $table = 'reservations';

    public function __construct(?int $room_id = null, ?int $guest_id = null, ?int $days = null, ?int $date = null) 
    {
        parent::__construct();
        if ($room_id) {
            $this->room_id = $room_id;
        }
        if ($guest_id) {
            $this->guest_id = $guest_id;
        }
        if ($days) {
            $this->days = $days;
        }
        if ($date) {
            $this->date = $date;
        }
    }
}