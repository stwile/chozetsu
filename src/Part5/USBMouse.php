<?php

declare(strict_types=1);

namespace App\Part5;

class USBMouse extends AbstractUSBDevice
{
    public function connect(InternalBus $bus): void
    {
    }

    public function moveCursor(float $direction, float $distance): void
    {
    }
}
