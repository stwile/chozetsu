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

    /** @test */
    public function saturate(): void
    {
        $math_stab = $this->createMock(Math::class);
        $math_util = new MathUtil($math_stab);

        $math_stab->method('max')
            ->willReturn(value: 2);
        $math_stab->method('min')
            ->willReturn(value: 2);

        $result = $math_util->saturate(2, 1, 3);

        $this->assertSame(
            expected: 2,
            actual: $result,
        );
    }
}
