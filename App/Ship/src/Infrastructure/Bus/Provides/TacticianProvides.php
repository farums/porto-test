<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Provides;


use Ship\Infrastructure\Provides\AbstractProvider;
use League\Tactician\CommandBus as TacticianCommandBus;
use Ship\Infrastructure\Bus\Tactician\Container\TacticianCommandBusFactory;

use Ship\Application\Contract\Bus\{
    CommandBusInterface,
    QueryBusInterface,
    MessageBusInterface
};
use Ship\Infrastructure\Bus\Tactician\{
    CommandBus,
    QueryBus,
    MessageBus
};

use Ship\Infrastructure\Bus\Tactician\Container\{
    CommandBusFactory,
    QueryBusFactory,
    MessageBusFactory
};

class TacticianProvides extends AbstractProvider {
    protected function dependencies(): array {
        return [
            'aliases'   => [
                CommandBusInterface::class => CommandBus::class,
                QueryBusInterface::class   => QueryBus::class,
                MessageBusInterface::class => MessageBus::class,

            ],
            'factories' => [
                CommandBus::class          => CommandBusFactory::class,
                QueryBus::class            => QueryBusFactory::class,
                MessageBus::class          => MessageBusFactory::class,
                TacticianCommandBus::class => TacticianCommandBusFactory::class,
            ]
        ];
    }
}