<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Data\Provides;

use Predis\Client;
use Ship\Infrastructure\Provides\AbstractProvider;
use Ship\Infrastructure\Data\Predis\PredisClientFactory;

class PredisProvider extends AbstractProvider {
    protected function dependencies(): array {
        return [
            'factories' => [
                Client::class => PredisClientFactory::class,
            ]
        ];
    }
    protected function config(): array {
        return [
            'redis' => $this->getConfigRedis()
        ];
    }
    public function getConfigRedis(): array {
        if (!empty(getenv('REDIS_PASSWORD'))) {
            return [
                'scheme'   => 'tcp',
                'host'     => getenv('REDIS_HOST'),
                'password' => getenv('REDIS_PASSWORD'),
                'port'     => getenv('REDIS_PORT'),
            ];
        }
        return [
            'scheme' => 'tcp',
            'host'   => getenv('REDIS_HOST'),
            'port'   => getenv('REDIS_PORT'),
        ];
    }
}