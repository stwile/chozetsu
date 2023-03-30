<?php

declare(strict_types=1);

namespace App\Part5\Connection;

use App\Part5\InternalBus;

interface USBDeviceInterface
{
    public function connect(InternalBus $bus): void;
}
