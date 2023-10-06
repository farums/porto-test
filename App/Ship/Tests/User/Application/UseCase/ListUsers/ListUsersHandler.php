<?php

namespace ShipTest\User\Application\UseCase\ListUsers;

use Ship\Application\Contract\UseCase\Query\{
    QueryInterface,
    QueryHandlerInterface
};
use ShipTest\User\Application\Data\Read\UserReadInterface;

class ListUsersHandler implements QueryHandlerInterface {
    public function __construct(private UserReadInterface $userRead) {
    }
    public function handler(ListUsersQuery|QueryInterface $query) {
        $query->setResult($this->userRead->getAllUsers());
    }
}