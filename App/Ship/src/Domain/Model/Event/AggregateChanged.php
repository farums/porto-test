<?php

namespace Ship\Domain\Model\Event;

use Ramsey\Uuid\Uuid;
use Ship\Domain\Trait\EventPayloadTrait;
use EventSauce\EventSourcing\AggregateRootId;
use Ship\Domain\Contract\Event\AggregateEventInterface;

abstract class AggregateChanged implements AggregateEventInterface {
    use EventPayloadTrait;

    public function __construct(
        protected AggregateRootId $aggregateId,
        public array $payload,
        protected array $metadata = []
    ) {
        $this->setPayload($payload);
        $this->setAggregateId($aggregateId);
    }

    public static function occur(AggregateRootId $aggregateId, array $payload = []): static {
        return new static($aggregateId, $payload);
    }

    public function toPayload(): array {
        return $this->getPayload();
    }

    public static function fromPayload(array $payload): static {
        return new static(Uuid::fromString($payload['id']), $payload);
    }
}