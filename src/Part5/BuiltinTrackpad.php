<?php

declare(strict_types=1);

namespace App\Part5;

use App\Part5\Operation\PointerDeviceInterface;

class BuiltinTrackpad implements PointerDeviceInterface
{
    public function moveCursor(float $direction, float $distance): void
    {
    }
}
