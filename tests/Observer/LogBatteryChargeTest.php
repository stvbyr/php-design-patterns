<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Test\Observer;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Observer\BatteryState;
use Stvbyr\PhpDesignPatterns\Observer\MessageBatteryCharge;

class LogBatteryChargeTest extends TestCase
{
    public const CHARGE = 6;

    public function testCanOutputTheChargeOfTheBatteryState(): void
    {
        $batteryStateMock = $this->getMockBuilder(BatteryState::class)
            ->disableOriginalConstructor()
            ->getMock();

        $batteryStateMock->expects($this->once())
            ->method('getLoad')
            ->willReturn(self::CHARGE);

        $logBatteryChargeHandler = new MessageBatteryCharge();
        $logBatteryChargeHandler->onNotification($batteryStateMock);

        $this->expectOutputString('Please charge the battery. Charge is '.self::CHARGE."\n");
    }
}
