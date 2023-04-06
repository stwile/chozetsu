<?php

declare(strict_types=1);

namespace App\Part6;

class MathUtil
{
    public function __construct(
        private Math $math,
    ) {
    }

    public function saturate(int $value, int $min_value, int $max_value): int
    {
        return $this->math->min(
            a: $this->math->max(
                a: $value,
                b: $min_value,
            ),
            b: $max_value,
        );
    }
}
