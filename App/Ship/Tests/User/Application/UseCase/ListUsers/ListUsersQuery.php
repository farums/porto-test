<?php

namespace ShipTest\User\Application\UseCase\ListUsers;

use Ship\Application\Contract\UseCase\Query\Query;
use Ship\Infrastructure\Bus\Attribute\HandlerAttribute;

#[HandlerAttribute(ListUsersHandler::class)]
class ListUsersQuery extends Query {
    public const QUAERY_NAME = 'ListUsers';

    public function getQueryName(): string {
        return self::QUAERY_NAME;
    }
}