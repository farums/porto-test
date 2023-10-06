<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Tactician;

use Ship\Application\Contract\Bus\CommandBusInterface;
use Ship\Application\Contract\UseCase\Command\CommandInterface;

class CommandBus extends Bus implements CommandBusInterface {

    public function handle(CommandInterface $command): void {
        $this->bus->handle($command);
    }
}