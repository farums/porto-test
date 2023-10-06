<?php

namespace Ship\Application\Contract\Bus;

use Ship\Application\Contract\UseCase\Query\QueryInterface;

interface QueryBusInterface {
    public function handle(QueryInterface $message): void;
}