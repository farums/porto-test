<?php
namespace ShipTest\User\Application\Data;

use ShipTest\User\Application\Data\UserInterface;
use ShipTest\User\Application\Data\Write\UserWriteInterface;

namespace ShipTest\User\Application\Data\Read;

interface UserReadInterface {
    /**
     * Получить пользователя по его идентификатору.
     *
     * @param mixed $userId Идентификатор пользователя.
     * @return mixed Вернуть пользователя или null, если не найден.
     */
    public function getUserById($userId);

    /**
     * Получить список всех пользователей.
     *
     * @return array Список всех пользователей.
     */
    public function getAllUsers();
}