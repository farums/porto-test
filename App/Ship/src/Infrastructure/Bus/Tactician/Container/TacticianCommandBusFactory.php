<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Tactician\Container;

use League\Tactician\CommandBus;
use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\Mapping\MethodName\Invoke;
use League\Tactician\Handler\Mapping\MapByNamingConvention;
use League\Tactician\Handler\Mapping\ClassName\ClassNameInflector;

class TacticianCommandBusFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): CommandBus {
        $handlerMiddleware = new CommandHandlerMiddleware(
            $container,
            new MapByNamingConvention(
                new ClassNameInflector(),
                new Invoke()
            )
        );
        return new CommandBus($handlerMiddleware);
    }
}