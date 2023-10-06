<?php

namespace ShipTest\User\Application\UseCase\Сreate;

use Ship\Application\Contract\UseCase\Command\{
    CommandInterface,
    CommandHandlerInterface
};
use ShipTest\User\Domain\Aggregate\User;
use ShipTest\User\Application\Data\Write\UserWriteInterface;

class СreateUserHandler implements CommandHandlerInterface {

    public function __construct(private UserWriteInterface $userWrite) {
    }

    public function handler(СreateUserCommand|CommandInterface $command): void {
        $user = User::CreateUser($command->id(), $command->name());
        $this->userWrite->save($user);
    }
}