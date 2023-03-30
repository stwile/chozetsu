<?php

declare(strict_types=1);

namespace Tests\Part6;

use App\Part6\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    private Math $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Math();
    }

    /** @test */
    public function minMax(): void
    {
        $this->assertSame(
            expected: 1,
            actual: $this->model->min(1, 2),
        );

        $this->assertSame(
            expected: 2,
            actual: $this->model->max(1, 2),
        );
    }
}
