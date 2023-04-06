<?php

declare(strict_types=1);

namespace Tests\Part6\FizzBuzz\Core;

use App\Part6\FizzBuzz\Core\NumberConverter;
use PHPUnit\Framework\TestCase;

class NumberConverterTest extends TestCase
{
    /** @test */
    public function convert(): void
    {
        $fizz_buzz = new NumberConverter();

        $this->assertSame(
            expected: '1',
            actual: $fizz_buzz->convert(),
        );
    }
}
