<?php

declare(strict_types=1);

namespace App\Part6\FizzBuzz\Core;

class NumberConverter
{
    private const FIZZ = 'Fizz';

    public function convert(int $n): string
    {
        if ($n === 3) {
            return self::FIZZ;
        }
        return (string) $n;
    }
}
