<?php

declare(strict_types=1);

namespace App\Part5;

use App\Part5\Operation\KeyboardInterface;

class BuiltinKeyboard implements KeyboardInterface
{
    public function typeKey(string $code): void
    {
    }
}
