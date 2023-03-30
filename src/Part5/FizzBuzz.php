<?php

declare(strict_types=1);

namespace App\Part5;

function fizz_buzz(int $n): string
{
    if ($n % 15 === 0) {
        // 3 でも 5 でも割り切れる場合は、Fizz や Buzzだけを return してしまわないよう先に判定する
        return 'FizzBuzz';
    }
    if ($n % 3 === 0) {
        return 'Fizz';
    }
    if ($n % 5 === 0) {
        return 'Buzz';
    }
    return (string) $n;
}
