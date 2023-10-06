<?php

namespace Ship\Infrastructure\Bus\Tactician\Middleware;

use function in_array;
use function class_implements;
use Ship\Application\Contract\UseCase\Query\QueryHandlerInterface;

final class QueryHandlerMiddleware extends HandlerMiddleware {
    public function canCreateHandler($requestedName): bool {
        return class_exists($requestedName) && in_array(QueryHandlerInterface::class, class_implements($requestedName), true);
    }
}