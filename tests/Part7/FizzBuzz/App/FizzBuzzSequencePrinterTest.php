<?php

declare(strict_types=1);

namespace Tests\Part7\FizzBuzz\App;

use App\Part7\FizzBuzz\App\FizzBuzzSequencePrinter;
use App\Part7\FizzBuzz\App\OutputInterface;
use App\Part7\FizzBuzz\Core\NumberConverter;
use PHPUnit\Framework\TestCase;

class FizzBuzzSequencePrinterTest extends TestCase
{
    /** @test */
    public function 何もPrintしない(): void
    {
        $converter = $this->createMock(originalClassName: NumberConverter::class);
        $converter->expects($this->never())->method('convert');

        $output = $this->createMock(originalClassName: OutputInterface::class);
        $output->expects($this->never())->method('write');

        $printer = new FizzBuzzSequencePrinter(fizz_buzz: $converter, output: $output);
        $printer->printRange(0, -1);
    }

    /** @test */
    public function １〜３まで(): void
    {
        $converter = $this->createMock(originalClassName: NumberConverter::class);
        $converter->expects($this->exactly(3))->method('convert')
            ->willReturnMap([
                [1, '1'],
                [2, '2'],
                [3, '3'],
            ]);

        $output = $this->createMock(originalClassName: OutputInterface::class);
        $output->expects($this->exactly(3))->method('write');

        $printer = new FizzBuzzSequencePrinter(fizz_buzz: $converter, output: $output);
        $printer->printRange(1, 3);
    }
}
