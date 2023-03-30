<?php

declare(strict_types=1);

namespace App\Part5;

use App\Part5\Operation\KeyboardInterface;
use App\Part5\Operation\PointerDeviceInterface;

class PCOperator
{
    public function __construct(
        protected KeyboardInterface $keyboard,
        protected PointerDeviceInterface $pointer_device,
    ) {
    }

    public function inputText(array $codes): void
    {
        foreach ($codes as $code) {
            $this->keyboard->typeKey($code);
        }
    }

    public function pointAt(int $x, int $y): void
    {
//        $this->pointer_device->moveCursor();
    }
}
