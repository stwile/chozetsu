<?php

declare(strict_types=1);

namespace App\Part5\DB;

interface DataOutputInterface
{
    public function read(string $key): mixed;
}
