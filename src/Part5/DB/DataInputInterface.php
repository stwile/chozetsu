<?php

declare(strict_types=1);

namespace App\Part5\DB;

interface DataInputInterface
{
    public function write(string $key, mixed $value): void;
}
