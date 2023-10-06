<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Data\Predis;

use Predis\Client;
use Psr\Container\ContainerInterface;

class PredisClientFactory {
    public function __invoke(ContainerInterface $container): Client {
        $config               = $container->get('config');
        $connectionParameters = $config['redis']; // required
        $clientOptions        = $config['client-options'] ?? []; // optional
        return new Client($connectionParameters, $clientOptions);
    }
}