<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use Stvbyr\PhpDesignPatterns\Memento\Booking;
use Stvbyr\PhpDesignPatterns\Memento\BookingState;
use Stvbyr\PhpDesignPatterns\Memento\History;

/** @var History<BookingState> */
$history = new History();

$booking = new Booking(1, new DateTimeImmutable('2022-01-01'));
$history->push(new BookingState($booking));

$booking->setDate(new DateTimeImmutable('2022-01-30'));
$history->push(new BookingState($booking));

echo $booking->getDate()->format(DATE_ISO8601).PHP_EOL; // 2022-01-30T00:00:00+0100

try {
    $booking->restore($history->getPrevious());
} catch (ErrorException $e) {
    echo 'If there is no previous change we need to catch this error';
}

echo $booking->getDate()->format(DATE_ISO8601).PHP_EOL; // 2022-01-01T00:00:00+0100
