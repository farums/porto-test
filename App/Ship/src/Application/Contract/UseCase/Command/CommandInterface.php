<?php
declare(strict_types=1);

namespace Ship\Application\Contract\UseCase\Command;

interface CommandInterface {

    public function setPayload(array $payload): void;
    public function getPayload(): array;
    public function getCommandName(): string;
}