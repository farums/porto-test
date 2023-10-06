<?php
namespace ShipTest\User\Аdapters\Data\Redis\Write;

use Predis\Client;
use ShipTest\User\Application\Data\Write\UserWriteInterface;
use ShipTest\User\Domain\Aggregate\User;
use ShipTest\User\Domain\ValueObject\UserID;

class UserWrite implements UserWriteInterface {

    public function save(User $user): void {
    }

    public function get(UserID $userID): User {
        return new User($userID);
    }
}