<?php

declare(strict_types=1);

namespace App\Part5\Operation;

interface KeyboardInterface
{
    public function typeKey(string $code): void;
}
