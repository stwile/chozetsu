<?php

declare(strict_types=1);

namespace App\Part7\FizzBuzz\App;

class ConsoleOutput implements OutputInterface
{
    public function write(string $data): void
    {
        echo $data;
    }
}
