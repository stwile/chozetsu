<?php

declare(strict_types=1);

namespace App\Part6\FizzBuzz\Core;

class NumberConverter
{
    public function convert(int $n): string
    {
        return (string) $n;
    }
}
