<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Tactician;

use League\Tactician\CommandBus as TacticianBus;

abstract class Bus {

    public function __construct(protected TacticianBus $bus) {
    }
}