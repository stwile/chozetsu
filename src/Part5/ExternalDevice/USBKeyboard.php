<?php

declare(strict_types=1);

namespace App\Part5\ExternalDevice;

use App\Part5\AbstractUSBDevice;
use App\Part5\InternalBus;
use App\Part5\Operation\KeyboardInterface;

class USBKeyboard extends AbstractUSBDevice implements KeyboardInterface
{
    public function connect(InternalBus $bus): void
    {
    }

    public function typeKey(string $code): void
    {
    }
}
