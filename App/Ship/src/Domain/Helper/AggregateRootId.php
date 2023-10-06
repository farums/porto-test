<?php

declare(strict_types=1);

namespace Ship\Domain\Helper;

use EventSauce\EventSourcing\AggregateRootId as AggregateRootIdInterface;
use Ramsey\Uuid\Uuid;

abstract class AggregateRootId implements AggregateRootIdInterface, \Stringable {
    final private function __construct(private readonly string $id) {
    }

    public static function generate(): self {
        return new static(Uuid::uuid4()->toString());
    }

    public static function fromString(string $aggregateRootId): static {
        if (Uuid::isValid($aggregateRootId) === false) {
            throw new \InvalidArgumentException('Invalid UUID provided');
        }
        return new static($aggregateRootId);
    }
    public function toString(): string {
        return $this->id;
    }
    public function __toString(): string {
        return $this->toString();
    }
}