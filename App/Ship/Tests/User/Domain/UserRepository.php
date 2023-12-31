<?php

declare(strict_types=1);

namespace Cafe\Domain\Tab;

interface UserRepository {
    public function save(Tab $tab): void;

    public function get(string $tabId): Tab;
}