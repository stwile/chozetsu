<?php

declare(strict_types=1);

namespace App\Part7\FizzBuzz\App;

use App\Part7\FizzBuzz\Core\NumberConverter;
use App\Part7\FizzBuzz\Rules\CyclicNumberRule;
use App\Part7\FizzBuzz\Rules\PassThroughRule;

class FizzBuzzAppFactory
{
    public function create(): FizzBuzzSequencePrinter
    {
        return new FizzBuzzSequencePrinter(
            fizz_buzz: $this->createFizzBuzz(),
            output: $this->createOutput(),
        );
    }

    private function createFizzBuzz(): NumberConverter
    {
        return new NumberConverter(rules: [
            new CyclicNumberRule(base: 3, replacement: 'Fizz'),
            new CyclicNumberRule(base: 5, replacement: 'Buzz'),
            new PassThroughRule(),
        ]);
    }

    private function createOutput(): OutputInterface
    {
        return new ConsoleOutput();
    }
}
