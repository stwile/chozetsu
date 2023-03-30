<?php

declare(strict_types=1);

namespace App\Part5;

use App\Part5\Connection\USBDeviceInterface;

class USBPort
{
    public function __construct(
        private InternalBus $internal_bus,
    ) {
    }

    public function plug(USBDeviceInterface $device): void
    {
        $device->connect($this->internal_bus);
    }
}
