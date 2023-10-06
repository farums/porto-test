<?php

declare(strict_types=1);

namespace ShipTest\User\Аdapters\Api\Controllers;

use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Elmut\Infrastructure\Mezzio\Interfaces\MezzioHandlerConfigProvider;

class ControllerConfigProvider implements
    MezzioHandlerConfigProvider {

    /** @var MezzioHandlerConfigProvider[] */
    private array $modules = [];

    public function __construct() {
        $this->addConfigProviders(new User\Provider());
    }

    private function addConfigProviders(MezzioHandlerConfigProvider $configProvider): void {
        $this->modules[] = $configProvider;
    }

    public function __invoke(): array {
        return [
            'dependencies' => $this->getDependencyConfig(),
        ];
    }

    public function registerRoutes(Application $app, MiddlewareFactory $factory): void {
        foreach ($this->modules as $module) {
            $module->registerRoutes($app, $factory);
        }
    }

    /**
     * Returns the container dependencies.
     */
    public function getDependencyConfig(): array {
        $dependencies = [];
        foreach ($this->modules as $module) {
            $dependencies = array_merge_recursive($dependencies, $module->getDependencyConfig());
        }

        return $dependencies;
    }
}