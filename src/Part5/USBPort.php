<?php

declare(strict_types=1);

namespace App\Part5;

class USBPort
{
    public function __construct(
        private InternalBus $internal_bus,
    ) {
    }

    public function plugKeyboard(USBKeyboard $keyboard): void
    {
        $keyboard->connect($this->internal_bus);
    }

    public function plugMouse(USBMouse $mouse): void
    {
        $mouse->connect($this->internal_bus);
    }
}
