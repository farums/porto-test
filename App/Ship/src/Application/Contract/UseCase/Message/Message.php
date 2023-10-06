<?php

namespace Ship\Application\Contract\UseCase\Message;

abstract class Message implements MessageInterface {
    use MessageResultTrait;
}