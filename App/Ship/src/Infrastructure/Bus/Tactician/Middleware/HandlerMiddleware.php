<?php

namespace Ship\Infrastructure\Bus\Tactician\Middleware;

use League\Tactician\Middleware;
use Psr\Container\ContainerInterface;
use Throwable;
use ReflectionClass;
use Ship\Infrastructure\Bus\Exception\ExecutionFailed;

abstract class HandlerMiddleware implements Middleware {

    public function __construct(protected ContainerInterface $container) {
    }

    public function execute($command, callable $next) {
        $className = $this->getHandlerName($command);
        $handler   = $this->container->get($className);
        return $handler->handler($command);
    }

    public function getHandlerName(object $command): mixed {
        try {
            $reflection = new ReflectionClass(get_class($command));
        }
        catch (Throwable $exception) {
            throw ExecutionFailed::create($exception->getMessage(), [
                'file'  => $exception->getFile(),
                'trace' => $exception->getTrace(),
            ]);
        }
        $attributes    = $reflection->getAttributes();
        $requestedName = $attributes[0]->getArguments()['handler'] ?? $attributes[0]->getArguments()[0];
        if ($this->canCreateHandler($requestedName)) {
            return $requestedName;
        }
        throw ExecutionFailed::create("Middleware for $requestedName is not supported.", [
            'file'  => $exception->getFile(),
            'trace' => $exception->getTrace(),
        ]);

    }
    abstract public function canCreateHandler($requestedName): bool;

}