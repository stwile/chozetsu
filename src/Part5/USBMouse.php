<?php

declare(strict_types=1);

namespace App\Part5;

use App\Part5\Operation\PointerDeviceInterface;

class USBMouse extends AbstractUSBDevice implements PointerDeviceInterface
{
    public function connect(InternalBus $bus): void
    {
    }

    public function moveCursor(float $direction, float $distance): void
    {
    }
}
