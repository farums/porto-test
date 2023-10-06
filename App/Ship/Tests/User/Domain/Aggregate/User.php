<?php

namespace ShipTest\User\Domain\Aggregate;

use Ship\Domain\Trait\BaseAggregateTrait;
use ShipTest\User\Domain\ValueObject\UserID;
use ShipTest\User\Domain\Events\CreateWasCreated;
use Ship\Domain\Contract\Aggregate\AggregateRootInterface;

final class User implements AggregateRootInterface {
    use BaseAggregateTrait;

    private UserID $id;
    private string $name;
    public function aggregateRootId(): UserID {
        return $this->id;
    }

    public function getId(): UserID {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public static function CreateUser(
        UserID $id,
        string $name,
    ): User {
        $user = new User($id);
        $user->recordThat(
            CreateWas::withData(
                $id,
                $name
            )
        );
        return $user;
    }

    public function whenCreateWas(CreateWas $event): void {
        $this->id   = $event->getUserID();
        $this->name = $event->getName();
    }
}


/*
public function changeProductName(
    string $name
): void {
    $this->recordThat(
        ProductNameWasChanged::withData(
            $this->aggregateRootId(),
            $name
        )
    );
}
public function whenProductNameWasChanged(ProductNameWasChanged $event): void
{
    $this->id = $event->getProductId();
    $this->name = $event->getName();
}

*/