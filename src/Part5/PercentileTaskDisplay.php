<?php

declare(strict_types=1);

namespace App\Part5;

class PercentileTaskDisplay extends TaskDisplay
{
    public function show(): string
    {
        $parent = parent::show();
        return "{$parent} ({$this->getPercent()} %)";
    }

    private function getPercent(): int
    {
        if ($this->total !== 0) {
            return (int) (100.0 * $this->remains / $this->total);
        }
        return 100;
    }
}
