<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class HandlerAttribute {
    public function __construct(private string $handler) {
    }

    public function getHandlerClass(): string {
        return $this->handler;
    }
}