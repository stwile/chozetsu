<?php

declare(strict_types=1);

namespace Tests\Part6;

use App\Part6\Math;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

use const PHP_INT_MAX;
use const PHP_INT_MIN;

class MathTest extends TestCase
{
    private Math $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Math();
    }

    #[TestWith([0, 0, 1])]
    #[TestWith([0, 1, 0])]
    #[TestWith([-1, 0, -1])]
    #[TestWith([-1, -1, 0])]
    #[TestWith([0, 0, 0])]
    #[TestWith([0, 0, PHP_INT_MAX])]
    #[TestWith([PHP_INT_MIN, 0, PHP_INT_MIN])]
    public function testMin(int $expected, int $input_a, int $input_b): void
    {
        $this->assertSame(
            expected: $expected,
            actual: $this->model->min($input_a, $input_b),
        );
    }

    #[TestWith([1, 0, 1])]
    #[TestWith([1, 1, 0])]
    #[TestWith([0, 0, -1])]
    #[TestWith([0, -1, 0])]
    #[TestWith([0, 0, 0])]
    #[TestWith([PHP_INT_MAX, 0, PHP_INT_MAX])]
    #[TestWith([0, 0, PHP_INT_MIN])]
    public function testMax(int $expected, int $input_a, int $input_b): void
    {
        $this->assertSame(
            expected: $expected,
            actual: $this->model->max($input_a, $input_b),
        );
    }
}
