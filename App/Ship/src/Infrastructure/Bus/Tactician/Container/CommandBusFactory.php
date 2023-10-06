<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Tactician\Container;

use Psr\Container\ContainerInterface;

use Laminas\ServiceManager\Factory\FactoryInterface;
use League\Tactician\CommandBus as TacticianBus;

use Ship\Application\Contract\Bus\CommandBusInterface;
use Ship\Infrastructure\Bus\Tactician\{
    CommandBus,
    Middleware\CommandHandlerMiddleware
};

class CommandBusFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): CommandBusInterface {
        return new CommandBus($this->getTacticianCommandBus($container));
    }
    private function getTacticianCommandBus(ContainerInterface $container): TacticianBus {
        $handlerMiddleware = new CommandHandlerMiddleware($container);
        return new TacticianBus([$handlerMiddleware]);
    }
}