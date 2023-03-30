<?php

declare(strict_types=1);

namespace App\Part5;

class USBKeyboard extends AbstractUSBDevice
{
    public function connect(InternalBus $bus): void
    {
    }

    public function typeKey(string $code): void
    {
    }
}
