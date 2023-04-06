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
        $math_stab = $this->createMock(originalClassName: Math::class);
        $math_util = new MathUtil(math: $math_stab);

        // 少なくとも1回 max が引数 2, 1 で呼ばれ、2を返す
        $math_stab->expects($this->atLeastOnce())
            ->method(constraint: 'max')
            ->with(
                $this->equalTo(value: 2),
                $this->equalTo(value: 1),
            )
            ->willReturn(value: 2);

        // 少なくとも 1 回 min が引数2, 3 で呼ばれ、2 を返す
        $math_stab->expects($this->atLeastOnce())
            ->method(constraint: 'min')
            ->with(
                $this->equalTo(value: 2),
                $this->equalTo(value: 3),
            )
            ->willReturn(value: 2);

        $result = $math_util->saturate(
            value: 2,
            min_value: 1,
            max_value: 3,
        );

        $this->assertSame(
            expected: 2,
            actual: $result,
        );
    }
}
