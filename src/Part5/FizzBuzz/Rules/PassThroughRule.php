<?php

declare(strict_types=1);

namespace App\Part5\FizzBuzz\Rules;

use App\Part5\FizzBuzz\Core\ReplaceRuleInterface;

/**
 * 変換条件に該当しない場合のルール
 */
class PassThroughRule implements ReplaceRuleInterface
{
    public function match(string $carry, int $n): bool
    {
        return $carry === '';
    }

    public function apply(string $carry, int $n): string
    {
        return (string) $n;
    }
}
