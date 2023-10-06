<?php

declare(strict_types=1);
namespace Ship\Infrastructure\Bus\Tactician\Container;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use League\Tactician\CommandBus as TacticianBus;

use Ship\Application\Contract\Bus\QueryBusInterface;
use Ship\Infrastructure\Bus\Tactician\{
    QueryBus,
    Middleware\QueryHandlerMiddleware
};

class QueryBusFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): QueryBusInterface {
        return new QueryBus($this->getTacticianQueryBus($container));
    }
    private function getTacticianQueryBus(ContainerInterface $container): TacticianBus {
        $handlerMiddleware = new QueryHandlerMiddleware($container);
        return new TacticianBus([$handlerMiddleware]);
    }
}