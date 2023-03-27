<?php

declare(strict_types=1);

namespace App\Part5\Writing;

use App\Part5\Writer;

class ArticleDraftOperation
{
    public function draft(Writer $writer): void
    {
        echo $writer::class;
    }
}
