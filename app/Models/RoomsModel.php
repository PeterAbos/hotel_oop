<?php

namespace App\Models;

class RoomsModel extends Model 
{
    public int|null $floor = null;
    public int|null $number = null;
    public int|null $capacity = null;
    public int|null $price = null;
    public string|null $comment = null;

    protected static $table = 'rooms';

    public function __construct(?int $floor = null, ?int $number = null, ?int $capacity = null, ?int $price = null, ?string $comment = null)
    {
        parent::__construct();
        if ($floor) {
            $this->floor = $floor;
        }
        if ($number) {
            $this->number = $number;
        }
        if ($capacity) {
            $this->capacity = $capacity;
        }
        if ($price) {
            $this->price = $price;
        }
        if ($comment) {
            $this->comment = $comment;
        }
    }


}