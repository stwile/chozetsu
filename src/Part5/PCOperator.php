<?php

declare(strict_types=1);

namespace App\Part5;

class PCOperator
{
    public function __construct(
        protected BuiltinKeyboard $builtin_keyboard,
        protected BuiltinTrackpad $builtin_trackpad,
        protected ?USBKeyboard $usb_keyboard = null,
        protected ?USBMouse $usb_mouse = null,
    ) {
    }

    public function inputText(array $codes): void
    {
        foreach ($codes as $code) {
            // USBキーボードがあれば使う
            if ($this->usb_keyboard === null) {
                $this->builtin_keyboard->typeKey($code);
                continue;
            }
            $this->usb_keyboard->typeKey($code);
        }
    }

    public function pointAt(int $x, int $y): void
    {
    }
}
