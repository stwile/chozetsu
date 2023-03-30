<?php

declare(strict_types=1);

namespace App\Part5\VendorDB;

use App\Part5\DB\DatabaseDriverInterface;

class VendorDatabaseDriver implements DatabaseDriverInterface
{
    public function write(string $key, mixed $value): void
    {
        // TODO: Implement write() method.
    }

    public function read(string $key): mixed
    {
        return 'read';
    }
}
