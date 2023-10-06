<?php

namespace Ship\Application\Contract\UseCase\Query;

interface QueryInterface {
    public function getQueryName(): string;
    public function getResult();
}