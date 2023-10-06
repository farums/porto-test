<?php
namespace ShipTest\User\Аdapters\Data\Redis\Read;

use Predis\Client;
use ShipTest\User\Application\Data\Read\UserReadInterface;

class UserRead implements UserReadInterface {

    public function __construct(private Client $client) {
    }

    public function getUserById($userId) {
    }

    public function getAllUsers() {
        return ["dfsf"];
    }
}