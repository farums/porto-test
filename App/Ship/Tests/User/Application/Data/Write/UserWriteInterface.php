<?php

namespace ShipTest\User\Application\Data\Write;

use ShipTest\User\Domain\Aggregate\User;
use ShipTest\User\Domain\ValueObject\UserID;

interface UserWriteInterface {
    public function save(User $user): void;

    public function get(UserID $userID): User;
}