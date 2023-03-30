<?php

declare(strict_types=1);

namespace App\Part5\Operation;

interface PointerDeviceInterface
{
    public function moveCursor(float $direction, float $distance): void;
}
