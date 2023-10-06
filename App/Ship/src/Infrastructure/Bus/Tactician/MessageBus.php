<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Tactician;

use Ship\Application\Contract\Bus\MessageBusInterface;
use Ship\Application\Contract\UseCase\Message\MessageInterface;

class MessageBus extends Bus implements MessageBusInterface {
    public function handle(MessageInterface $message): void {
        $this->bus->handle($message);
    }
}