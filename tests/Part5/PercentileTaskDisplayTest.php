<?php

declare(strict_types=1);

namespace Tests\Part5;

use App\Part5\PercentileTaskDisplay;
use Error;
use PHPUnit\Framework\TestCase;

class PercentileTaskDisplayTest extends TestCase
{
    /** @test */
    public function show_totalが0件の場合(): void
    {
        try {
            $total = 0;
            $remains = 10;
            $model = new PercentileTaskDisplay(
                total: $total,
                remains: $remains,
            );
            $model->show();
        } catch (Error $error) {
            $this->assertSame(
                expected: 'Division by zero',
                actual: $error->getMessage(),
            );
        }
    }

    /** @test */
    public function show_totalが0ではない場合(): void
    {
        $total = 100;
        $remains = 10;
        $model = new PercentileTaskDisplay(
            total: $total,
            remains: $remains,
        );

        $this->assertSame(
            expected: "{$total} 件中 {$remains} 件が完了しました (10 %)",
            actual: $model->show(),
        );
    }
}
