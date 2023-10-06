<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Data\Provides;

use Ship\Infrastructure\Provides\AbstractProvider;

class SymfonyProvides extends AbstractProvider {
    protected function dependencies(): array {
        return [
            'factories' => [
            ]
        ];
    }
}