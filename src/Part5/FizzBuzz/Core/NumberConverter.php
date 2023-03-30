<?php

declare(strict_types=1);

namespace App\Part5\FizzBuzz\Core;

class NumberConverter
{
    /**
     * @param ReplaceRuleInterface[] $rules
     */
    public function __construct(
        readonly protected array $rules,
    ) {
    }

    public function convert(int $n): string
    {
        $carry = '';
        foreach ($this->rules as $rule) {
            if ($rule->match($carry, $n)) {
                $carry = $rule->apply($carry, $n);
            }
        }
        return $carry;
    }
}
