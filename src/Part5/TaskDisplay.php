<?php

declare(strict_types=1);

namespace App\Part5;

class TaskDisplay
{
    public function __construct(
        private int $total,
        private int $remains,
    ) {
    }

    public function show(): string
    {
        return "{$this->total} 件中 {$this->remains} 件が完了しました";
    }
}
