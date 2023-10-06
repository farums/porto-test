<?php

namespace Ship\Infrastructure\Bus\Tactician\Middleware;

use function in_array;
use function class_implements;
use Ship\Application\Contract\UseCase\Message\MessageHandlerInterface;

final class MessageHandlerMiddleware extends HandlerMiddleware {
    public function canCreateHandler($requestedName): bool {
        return class_exists($requestedName) && in_array(MessageHandlerInterface::class, class_implements($requestedName), true);
    }
}