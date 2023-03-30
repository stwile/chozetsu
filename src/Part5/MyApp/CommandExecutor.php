<?php

declare(strict_types=1);

namespace App\Part5\MyApp;

use App\Part5\DB\DataInputInterface;

class CommandExecutor
{
    public function __construct(
        protected DataInputInterface $input,
    ) {
    }

    public function exec(string $key, int $value): void
    {
        $this->input->write($key, $value);
    }
}
