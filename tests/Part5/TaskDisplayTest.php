<?php

declare(strict_types=1);

namespace Tests\Part5;

use App\Part5\TaskDisplay;
use PHPUnit\Framework\TestCase;

class TaskDisplayTest extends TestCase
{
    /** @test */
    public function show(): void
    {
        $total = 999999;
        $remains = 888888;
        $model = new TaskDisplay(
            total: $total,
            remains: $remains,
        );

        $this->assertSame(
            expected: "{$total} 件中 {$remains} 件が完了しました",
            actual: $model->show(),
        );
    }
}
