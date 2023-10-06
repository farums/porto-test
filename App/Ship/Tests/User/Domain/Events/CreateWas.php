<?php

namespace ShipTest\User\Domain\Events;

use ShipTest\User\Domain\ValueObject\UserID;
use Ship\Domain\Model\Event\AggregateChanged;

class CreateWas extends AggregateChanged {
    public static function withData(
        UserID $userID,
        string $name
    ): CreateWas {
        return self::occur(
            $userID,
            [
                'name' => $name,
            ]
        );
    }

    public function getUserID(): UserID {
        return UserID::fromString($this->aggregateId());
    }

    public function getName(): string {
        return $this->payload['name'];
    }
}