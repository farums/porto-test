<?php

namespace Ship\Domain\Trait;

use EventSauce\EventSourcing\AggregateRootId;

trait EventPayloadTrait {
    public function setPayload(array $payload): void {
        $this->payload = $payload;
    }

    public function getPayload(): array {
        return $this->payload;
    }

    protected function setAggregateId(AggregateRootId $aggregateId): void {
        $this->metadata['aggregate_id'] = $aggregateId->toString();
        $this->payload['id']            = $aggregateId->toString();
    }

    public function aggregateId(): string {
        return $this->metadata['aggregate_id'];
    }
}