<?php
namespace ShipTest\User\Аdapters\Data\Inmemory\Read;

use ShipTest\User\Application\Data\Read\UserReadInterface;

class UserRead implements UserReadInterface {
    private $users = [];

    public function getUserById($userId) {
        return $this->users[$userId] ?? null;
    }
    public function getAllUsers() {
        return array_values($this->users);
    }
}