<?php

namespace Ship\Application\Contract\UseCase\Command;

abstract class Command implements CommandInterface {
    use CommandPayloadTrait;
    abstract public static function withData(...$params): CommandInterface;
}