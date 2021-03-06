<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Memento;

use DateTimeInterface;

class BookingState implements StateInterface
{
    private int $number;
    private DateTimeInterface $date;

    public function __construct(Booking $booking)
    {
        $this->number = $booking->getNumber();
        $this->date = $booking->getDate();
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }
}
