<?php
namespace ShipTest\User\Application\Data;

use ShipTest\User\Application\Data\UserInterface;

namespace ShipTest\User\Application\Data;

interface UserRepositoryInterface {
    /**
     * Получить пользователя по его идентификатору.
     *
     * @param mixed $userId Идентификатор пользователя.
     * @return mixed Вернуть пользователя или null, если не найден.
     */
    public function getUserById($userId);

    /**
     * Обновить информацию о пользователе.
     *
     * @param mixed $user Объект пользователя для обновления.
     * @return void
     */
    public function updateUser($user);

    /**
     * Создать нового пользователя.
     *
     * @param mixed $user Объект нового пользователя.
     * @return void
     */
    public function createUser($user);

    /**
     * Удалить пользователя по его идентификатору.
     *
     * @param mixed $userId Идентификатор пользователя для удаления.
     * @return void
     */
    public function deleteUser($userId);

    /**
     * Получить список всех пользователей.
     *
     * @return array Список всех пользователей.
     */
    public function getAllUsers();
}