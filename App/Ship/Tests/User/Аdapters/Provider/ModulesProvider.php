<?php

declare(strict_types=1);

namespace ShipTest\User\Аdapters\Provider;

use Ship\Infrastructure\Provides\AbstractProvider;
use ShipTest\User\Аdapters\Data\Redis\UserRepositoryProvider;

class ModulesProvider extends AbstractProvider {

    private array $modules = [];

    public function __construct() {
        $this->addConfigProviders(new Application\UseCaseProvider());
        $this->addConfigProviders(new UserRepositoryProvider());
    }

    private function addConfigProviders($provider): void {
        $this->modules[] = $provider;
    }

    public function dependencies(): array {
        $dependencies = [];
        foreach ($this->modules as $module) {
            $dependencies = array_merge_recursive($dependencies, $module->dependencies());
        }

        return $dependencies;
    }

    public function abstractFactories(): array {
        $factories = [];
        foreach ($this->modules as $module) {
            $moduleFactories = $module->abstractFactories();
            $factories       = array_merge_recursive($factories, $moduleFactories);
        }
        return $factories;
    }
}