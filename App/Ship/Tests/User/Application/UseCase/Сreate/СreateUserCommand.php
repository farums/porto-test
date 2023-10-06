<?php

namespace ShipTest\User\Application\UseCase\Сreate;

use ShipTest\User\Domain\ValueObject\UserID;
use Ship\Application\Contract\UseCase\Command\Command;
use Ship\Infrastructure\Bus\Attribute\HandlerAttribute;


#[HandlerAttribute(СreateUserHandler::class)]
class СreateUserCommand extends Command {
    public const QUAERY_NAME = 'СreateUser';

    public function getCommandName(): string {
        return self::QUAERY_NAME;
    }

    public static function withData(...$params): СreateUserCommand {
        return new СreateUserCommand([
            'id'   => $params['id'],
            'name' => $params['name']
        ]);
    }

    public function id(): UserID {
        return UserID::fromString($this->payload['id']);
    }

    public function name(): string {
        return $this->payload['name'];
    }
}