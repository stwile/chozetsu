<?php

declare(strict_types=1);

namespace App\Part5;

abstract class AbstractUSBDevice
{
    abstract public function connect(InternalBus $bus): void;
}
