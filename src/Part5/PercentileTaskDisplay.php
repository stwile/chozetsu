<?php

declare(strict_types=1);

namespace App\Part5;

class PercentileTaskDisplay extends TaskDisplay
{
    public function show(): string
    {
        $percent = (int) (100.0 * $this->remains / $this->total);
        $parent = parent::show();
        return "{$parent} ({$percent} %)";
    }
}
