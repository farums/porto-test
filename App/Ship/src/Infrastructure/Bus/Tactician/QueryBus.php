<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Bus\Tactician;

use Ship\Application\Contract\Bus\QueryBusInterface;
use Ship\Application\Contract\UseCase\Query\QueryInterface;

class QueryBus extends Bus implements QueryBusInterface {
    public function handle(QueryInterface $query): void {
        $this->bus->handle($query);
    }
}