<?php
namespace ShipTest\User\Аdapters\Provider\Application;

use Ship\Infrastructure\Provides\AbstractProvider;
use ShipTest\User\Application\Data\Read\UserReadInterface;
use ShipTest\User\Application\Data\Write\UserWriteInterface;
use ShipTest\User\Application\UseCase\Сreate\СreateUserHandler;
use Laminas\ServiceManager\AbstractFactory\ConfigAbstractFactory;
use ShipTest\User\Application\UseCase\ListUsers\ListUsersHandler;

class UseCaseProvider extends AbstractProvider {

    public function dependencies(): array {
        return [
            'factories' => [
                ListUsersHandler::class  => ConfigAbstractFactory::class,
                СreateUserHandler::class => ConfigAbstractFactory::class,
            ]
        ];
    }
    public function abstractFactories(): array {
        return [
                // Здесь мы связываем интерфейс с его реализацией
            ListUsersHandler::class  => [UserReadInterface::class],
            СreateUserHandler::class => [UserWriteInterface::class],
        ];
    }
}