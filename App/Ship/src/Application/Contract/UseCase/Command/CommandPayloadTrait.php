<?php

namespace Ship\Application\Contract\UseCase\Command;

trait CommandPayloadTrait {
    protected array $payload;

    public function setPayload(array $payload): void {
        $this->payload = $payload;
    }

    public function __construct(array $payload) {
        $this->setPayload($payload);
    }

    public function getPayload(): array {
        return $this->payload;
    }
}