<?php

declare(strict_types=1);

namespace App\Part6\FizzBuzz\Core;

class NumberConverter
{
    private const FIZZ = 'Fizz';
    private const BUZZ = 'Buzz';

    public function convert(int $n): string
    {
        if ($n % 3 === 0 && $n % 5 === 0) {
            return self::FIZZ . self::BUZZ;
        }
        if ($n % 3 === 0) {
            return self::FIZZ;
        }
        if ($n % 5 === 0) {
            return self::BUZZ;
        }
        return (string) $n;
    }
}
