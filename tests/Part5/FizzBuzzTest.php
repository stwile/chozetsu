<?php

declare(strict_types=1);

namespace Tests\Part5;

use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

use function App\Part5\fizz_buzz;

class FizzBuzzTest extends TestCase
{
    #[TestWith([1, '1'])]
    #[TestWith([2, '2'])]
    #[TestWith([3, 'Fizz'])]
    #[TestWith([4, '4'])]
    #[TestWith([5, 'Buzz'])]
    #[TestWith([6, 'Fizz'])]
    #[TestWith([7, '7'])]
    #[TestWith([8, '8'])]
    #[TestWith([9, 'Fizz'])]
    #[TestWith([10, 'Buzz'])]
    #[TestWith([11, '11'])]
    #[TestWith([12, 'Fizz'])]
    #[TestWith([13, '13'])]
    #[TestWith([14, '14'])]
    #[TestWith([15, 'FizzBuzz'])]
    public function test(int $input, string $expected): void
    {
        $actual = fizz_buzz($input);
        $this->assertSame($expected, $actual);
    }
}
