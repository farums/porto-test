<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Tactician\Container;

use Psr\Container\ContainerInterface;

use Laminas\ServiceManager\Factory\FactoryInterface;
use League\Tactician\CommandBus as TacticianBus;

use Ship\Application\Contract\Bus\MessageBusInterface;
use Ship\Infrastructure\Bus\Tactician\{
    MessageBus,
    Middleware\MessageHandlerMiddleware
};


class MessageBusFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): MessageBusInterface {
        return new MessageBus($this->getTacticianCommandBus($container));
    }
    private function getTacticianCommandBus(ContainerInterface $container): TacticianBus {
        $handlerMiddleware = new MessageHandlerMiddleware($container);
        return new TacticianBus([$handlerMiddleware]);
    }
}