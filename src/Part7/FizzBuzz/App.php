<?php

declare(strict_types=1);

namespace App\Part7\FizzBuzz;

use App\Part7\FizzBuzz\App\FizzBuzzSequencePrinter;

class App
{
    public static function main(): void
    {
        $printer = new FizzBuzzSequencePrinter();
        $printer->printRange(1, 100);
    }
}
