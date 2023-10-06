<?php
namespace Packages\Porto\Core\Command;

class ShipCommandsProvider extends AbstractProvider {
    protected function dependencies(): array {
        return [
        ];
    }

    protected function config() {
        return [
            'commands' => [
            ]
        ];
    }
}