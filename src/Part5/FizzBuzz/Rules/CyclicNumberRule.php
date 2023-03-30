<?php

declare(strict_types=1);

namespace App\Part5\FizzBuzz\Rules;

use App\Part5\FizzBuzz\Core\ReplaceRuleInterface;

/**
 * 倍数に関するルール
 */
class CyclicNumberRule implements ReplaceRuleInterface
{
    public function __construct(
        protected int $base,
        protected string $replacement,
    ) {
    }

    public function match(string $carry, int $n): bool
    {
        return $n % $this->base === 0;
    }

    public function apply(string $carry, int $n): string
    {
        return "{$carry}{$this->replacement}";
    }
}
