<?php
namespace ShipTest\User\Аdapters\Data\Redis;

use Predis\Client;
use Ship\Infrastructure\Provides\AbstractProvider;
use Laminas\ServiceManager\Factory\InvokableFactory;
use ShipTest\User\Application\Data\Read\UserReadInterface;
use ShipTest\User\Application\Data\Write\UserWriteInterface;
use Laminas\ServiceManager\AbstractFactory\ConfigAbstractFactory;

class UserRepositoryProvider extends AbstractProvider {

    protected function dependencies(): array {
        return [
            'aliases'   => [
                UserReadInterface::class  => Read\UserRead::class,
                UserWriteInterface::class => Write\UserWrite::class,
            ],
            'factories' => [
                Read\UserRead::class   => ConfigAbstractFactory::class,
                Write\UserWrite::class => InvokableFactory::class
            ]
        ];
    }
    protected function abstractFactories(): array {
        return [
                // Здесь мы связываем интерфейс с его реализацией
            Read\UserRead::class => [Client::class],
        ];
    }
}