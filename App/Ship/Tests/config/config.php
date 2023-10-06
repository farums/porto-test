<?php

declare(strict_types=1);

namespace ShipTest\config;

use Laminas\ConfigAggregator\ConfigAggregator;
use ShipTest\User\Аdapters\Provider\ModulesProvider;

use Ship\Infrastructure\{
    Data\Provides\PredisProvider,
    Bus\Provides\TacticianProvides
};

$aggregator = new ConfigAggregator(
    [
            //Infrastructure
        PredisProvider::class,
        TacticianProvides::class,
            // Аdapters
        ModulesProvider::class,

    ]
);
return $aggregator->getMergedConfig();