<?php

declare(strict_types=1);

namespace App\Part5\FizzBuzz\Core;

interface ReplaceRuleInterface
{
    public function match(string $carry, int $n): bool;

    public function apply(string $carry, int $n): string;
}
