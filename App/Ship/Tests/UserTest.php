<?php
namespace ShipTest\Tests;

use Predis\Client;
use PHPUnit\Framework\TestCase;
use Laminas\ServiceManager\ServiceManager;
use Ship\Application\Contract\Bus\QueryBusInterface;
use ShipTest\User\Аdapters\Data\Redis\Read\UserRead;
use Ship\Application\Contract\Bus\CommandBusInterface;
use Ship\Application\Contract\Bus\MessageBusInterface;
use ShipTest\User\Application\Data\Read\UserReadInterface;
use ShipTest\User\Application\Data\Write\UserWriteInterface;
use ShipTest\User\Application\UseCase\ListUsers\ListUsersQuery;
use ShipTest\User\Application\UseCase\Сreate\СreateUserCommand;
use ShipTest\User\Application\UseCase\ListUsers\ListUsersHandler;
use Ship\Application\Contract\UseCase\Query\QueryHandlerInterface;
use Ramsey\Uuid\Uuid as RamseyUuid;

class UserTest extends TestCase {
    protected ServiceManager $serviceManager;
    public function setUp(): void {

        $config       = require __DIR__ . '/config/config.php';
        $dependencies = $config['dependencies'];
        unset($config['dependencies']);
        $dependencies['services']['config'] = $config;
        // Build container
        $this->serviceManager = new ServiceManager($dependencies);
    }

    public function test_Repository() {
        $client   = $this->serviceManager->get(Client::class);
        $userRead = $this->serviceManager->get(UserReadInterface::class);
        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(UserRead::class, $userRead);

        $userWrite = $this->serviceManager->get(UserWriteInterface::class);
        //   $this->assertInstanceOf(UserWriteInterface::class, $userWrite);
    }

    public function test_UseCase() {
        $listUsersHandler = $this->serviceManager->get(ListUsersHandler::class);
        $this->assertInstanceOf(QueryHandlerInterface::class, $listUsersHandler);
    }
    public function test_Bus_Tactician() {
        $busQuery   = $this->serviceManager->get(QueryBusInterface::class);
        $busCommand = $this->serviceManager->get(CommandBusInterface::class);
        $busMessage = $this->serviceManager->get(MessageBusInterface::class);

        $this->assertInstanceOf(QueryBusInterface::class, $busQuery);
        $this->assertInstanceOf(CommandBusInterface::class, $busCommand);
        $this->assertInstanceOf(MessageBusInterface::class, $busMessage);
        $this->assertTrue(method_exists($busQuery, 'handle'));
        $this->assertTrue(method_exists($busCommand, 'handle'));
        $this->assertTrue(method_exists($busMessage, 'handle'));

        //busQuery
        $query = new ListUsersQuery();
        $busQuery->handle($query);
        $this->assertNotEmpty($query->getResult());

        //busCommand
        $command = СreateUserCommand::withData(...[
            'id'   => RamseyUuid::uuid4()->toString(),
            'name' => 'name',
        ]);
        $busCommand->handle($command);
    }
}