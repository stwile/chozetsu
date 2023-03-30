<?php

declare(strict_types=1);

namespace App\Part5\ExternalDevice;

use App\Part5\AbstractUSBDevice;
use App\Part5\InternalBus;
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
