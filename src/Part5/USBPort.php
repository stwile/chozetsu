<?php

declare(strict_types=1);

namespace App\Part5;

class USBPort
{
    public function __construct(
        private InternalBus $internal_bus,
    ) {
    }

    public function plug(AbstractUSBDevice $device): void
    {
        $device->connect($this->internal_bus);
    }
}
