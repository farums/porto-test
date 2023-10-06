<?php
namespace ShipTest\User\Аdapters\Data\Inmemory;

use Predis\Client;
use Ship\Infrastructure\Provides\AbstractProvider;
use Laminas\ServiceManager\Factory\InvokableFactory;
use ShipTest\User\Application\Data\Read\UserReadInterface;

class UserRepositoryProvider extends AbstractProvider {

    protected function dependencies(): array {
        return [
            'aliases'   => [
                UserReadInterface::class => Read\UserRepository::class,
            ],
            'factories' => [
                Read\UserRepository::class => InvokableFactory::class,
            ]
        ];
    }
}