<?php

declare(strict_types=1);

namespace App\Part5;

use App\Part5\FizzBuzz\Core\NumberConverter;
use App\Part5\FizzBuzz\Rules\CyclicNumberRule;
use App\Part5\FizzBuzz\Rules\PassThroughRule;

function fizz_buzz(int $n): string
{
    $converter = new NumberConverter(rules: [
        new CyclicNumberRule(base: 3, replacement: 'Fizz'),
        new CyclicNumberRule(base: 5, replacement: 'Buzz'),
        new PassThroughRule(),
    ]);
    return $converter->convert($n);
}
