<?php

declare(strict_types=1);

namespace App\Part7\FizzBuzz;

use App\Part7\FizzBuzz\App\FizzBuzzAppFactory;

class App
{
    public static function main(): void
    {
        $factory = new FizzBuzzAppFactory();
        $printer = $factory->create();
        $printer->printRange(1, 100);
    }
}
