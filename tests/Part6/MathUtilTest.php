<?php

declare(strict_types=1);

namespace Tests\Part6;

use App\Part6\Math;
use App\Part6\MathUtil;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

class MathUtilTest extends TestCase
{
    private MathUtil $util;

    protected function setUp(): void
    {
        parent::setUp();
        $this->util = new MathUtil(
            new Math(),
        );
    }

    #[TestWith([2, 2, 1, 3])]
    #[TestWith([1, 0, 1, 3])]
    #[TestWith([3, 4, 1, 3])]
    #[TestWith([3, 3, 1, 3])]
    public function testSaturate(
        int $expected,
        int $value,
        int $min_value,
        int $max_value,
    ): void {
        $this->assertSame(
            expected: $expected,
            actual: $this->util->saturate(
                value: $value,
                min_value: $min_value,
                max_value: $max_value,
            ),
        );
    }
}
