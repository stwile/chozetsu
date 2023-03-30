<?php

declare(strict_types=1);

namespace App\Part6;

class Math
{
    public function min(int $a, int $b): int
    {
        if ($a < $b) {
            return $a;
        }
        return $b;
    }

    public function max(int $a, int $b): int
    {
        if ($a > $b) {
            return $a;
        }
        return $b;
    }
}
