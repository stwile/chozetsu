<?php

declare(strict_types=1);

namespace App\Part7\FizzBuzz\App;

use App\Part7\FizzBuzz\Core\NumberConverter;
use App\Part7\FizzBuzz\Rules\CyclicNumberRule;
use App\Part7\FizzBuzz\Rules\PassThroughRule;

class FizzBuzzSequencePrinter
{
    public function printRange(int $begin, int $end): void
    {
        $fizz_buzz = new NumberConverter([
            new CyclicNumberRule(base: 3, replacement: 'Fizz'),
            new CyclicNumberRule(base: 5, replacement: 'Buzz'),
            new PassThroughRule(),
        ]);
        for ($i = $begin; $i <= $end; $i++) {
            printf("%d %s\n", $i, $fizz_buzz->convert($i));
        }
    }
}
