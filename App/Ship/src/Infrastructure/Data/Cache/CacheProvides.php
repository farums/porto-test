<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Data\Cache;

use Ship\Infrastructure\Provides\AbstractProvider;

class CacheProvides extends AbstractProvider {
    protected function dependencies(): array {
        return [ ]
    }
}