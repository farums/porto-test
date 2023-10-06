<?php

namespace Ship\Application\Contract\UseCase\Query;

trait QueryResultTrait {
    protected $result = null;

    public function setResult($result): void {
        $this->result = $result;
    }

    public function getResult() {
        return $this->result;
    }
}