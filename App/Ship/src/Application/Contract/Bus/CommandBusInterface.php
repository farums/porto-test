<?php
declare(strict_types=1);

namespace Ship\Application\Contract\Bus;

use Ship\Application\Contract\UseCase\Command\CommandInterface;

interface CommandBusInterface {
    public function handle(CommandInterface $command): void;
}