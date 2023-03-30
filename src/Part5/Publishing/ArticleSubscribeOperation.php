<?php

declare(strict_types=1);

namespace App\Part5\Publishing;

use App\Part5\Subscriber;

class ArticleSubscribeOperation
{
    public function subscribe(Subscriber $subscriber): void
    {
        echo $subscriber::class;
    }
}
