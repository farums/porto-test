<?php

namespace Ship\Application\Contract\UseCase\Message;

interface MessageInterface {
    public function getMessageName(): string;
    public function getResult();
}