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

        $this->assertSame(expected: '1', actual: $fizz_buzz->convert(1));
        $this->assertSame(expected: '2', actual: $fizz_buzz->convert(2));
        $this->assertSame(expected: 'Fizz', actual: $fizz_buzz->convert(3));
        $this->assertSame(expected: '4', actual: $fizz_buzz->convert(4));
        $this->assertSame(expected: 'Buzz', actual: $fizz_buzz->convert(5));
        $this->assertSame(expected: 'Fizz', actual: $fizz_buzz->convert(6));
        $this->assertSame(expected: 'Buzz', actual: $fizz_buzz->convert(10));
        $this->assertSame(expected: 'FizzBuzz', actual: $fizz_buzz->convert(15));
        $this->assertSame(expected: 'FizzBuzz', actual: $fizz_buzz->convert(30));
    }
}
