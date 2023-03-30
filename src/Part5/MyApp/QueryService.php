<?php

declare(strict_types=1);

namespace App\Part5\MyApp;

use App\Part5\DB\DataOutputInterface;

class QueryService
{
    public function __construct(
        protected DataOutputInterface $output,
    ) {
    }

    public function query(string $key): void
    {
        $this->output->read($key);
    }
}
