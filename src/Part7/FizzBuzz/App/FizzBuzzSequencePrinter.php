<?php

declare(strict_types=1);

namespace App\Part7\FizzBuzz\App;

use App\Part7\FizzBuzz\Core\NumberConverter;

class FizzBuzzSequencePrinter
{
    public function __construct(
        readonly private NumberConverter $fizz_buzz,
        readonly private OutputInterface $output,
    ) {
    }

    public function printRange(int $begin, int $end): void
    {
        for ($i = $begin; $i <= $end; $i++) {
            $text = $this->fizz_buzz->convert($i);
            $formatted_text = sprintf("%d %s\n", $i, $text);
            $this->output->write($formatted_text);
        }
    }
}
