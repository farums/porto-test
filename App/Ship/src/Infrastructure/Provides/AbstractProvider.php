<?php
namespace Ship\Infrastructure\Provides;

use Laminas\ServiceManager\AbstractFactory\ConfigAbstractFactory;

abstract class AbstractProvider {
    public function __invoke() {
        $services['dependencies']               = $this->dependencies();
        $services[ConfigAbstractFactory::class] = $this->abstractFactories();
        $services                               = array_merge($services, $this->config());
        return $services;
    }

    abstract protected function dependencies(): array;

    protected function config(): array {
        return [];
    }

    protected function abstractFactories(): array {
        return [];
    }
}