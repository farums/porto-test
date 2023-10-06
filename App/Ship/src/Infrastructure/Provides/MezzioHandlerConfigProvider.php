<?php

declare(strict_types=1);

namespace Ship\Infrastructure\Provides;

use Mezzio\Application;
use Mezzio\MiddlewareFactory;

interface MezzioHandlerConfigProvider {
    public function registerRoutes(Application $app, MiddlewareFactory $factory): void;
}