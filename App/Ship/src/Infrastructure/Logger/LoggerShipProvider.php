<?php

declare(strict_types=1);

namespace Packages\Porto\Core\Logger;

use Psr\Log\LoggerInterface;
use Monolog\{
    Logger,
    Handler\StreamHandler,
    Handler\RotatingFileHandler
};

class LoggerShipProvider extends AbstractProvider {
    protected function dependencies(): array {
        return [
            'factories' => [
                    //Logger factory
                LoggerInterface::class => MonologFactory::class,
            ]
        ];
    }

    protected function abstractFactories(): array {
        return [
            DomainExceptionHandler::class => [Logger::class]
        ];
    }

    protected function config() {
        return [
            $this->getMonolog()
        ];
    }
    public static function getMonolog(): array {
        $debug = (bool) getenv('DEBUG');
        return [
            'handlers' => [
                [
                    'type'   => StreamHandler::class,
                    'stream' => 'php://stderr',
                    'level'  => $debug ? Logger::DEBUG : Logger::INFO,
                ],
                [
                    'type'            => RotatingFileHandler::class,
                    'filename'        => 'data/logs/logger/Console-logger.log',
                    'maxFiles'        => 30,
                    'level'           => $debug ? Logger::DEBUG : Logger::INFO,
                    'file_permission' => 0666,
                ],
            ],
        ];
    }
}