<?php

namespace Ship\Application\Contract\UseCase\Query;

abstract class Query implements QueryInterface {
    use QueryResultTrait;
}