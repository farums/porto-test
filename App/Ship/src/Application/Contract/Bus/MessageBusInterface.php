<?php

namespace Ship\Application\Contract\Bus;

use Ship\Application\Contract\UseCase\Message\MessageInterface;

interface MessageBusInterface {
    public function handle(MessageInterface $message): void;
}