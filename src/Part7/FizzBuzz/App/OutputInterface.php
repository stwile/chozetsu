<?php

declare(strict_types=1);

namespace App\Part7\FizzBuzz\App;

interface OutputInterface
{
    public function write(string $data): void;
}
