<?php

declare(strict_types=1);

namespace Packages\Porto\Core\Logger;

use function array_key_exists;

use Monolog\{
    Logger,
    Handler\StreamHandler,
    Handler\RotatingFileHandler,
    Handler\SlackWebhookHandler,
    Processor\PsrLogMessageProcessor
};
use Psr\{
    Container\ContainerInterface,
    Log\LoggerInterface,
};

class MonologFactory {
    public function __invoke(ContainerInterface $container): LoggerInterface {

        $config   = $container->has('config') ? $container->get('config') : [];
        $handlers = $config['monolog']['handlers'] ?? [];

        // Create logger
        $logger = new Logger('Ship', [], [new PsrLogMessageProcessor()]);

        // Add handlers
        foreach ($handlers as $handlerConfig) {
            $this->pushHandler($logger, $handlerConfig);
        }
        return $logger;
    }

    private function pushHandler(Logger $logger, array $config): void {
        switch ($config['type']) {
            case StreamHandler::class:
                $logger->pushHandler(
                    new StreamHandler(
                        $config['stream'],
                        $config['level'] ?? Logger::DEBUG
                    )
                );
                break;
            case RotatingFileHandler::class:
                $logger->pushHandler(
                    new RotatingFileHandler(
                        $config['filename'],
                        $config['maxFiles'],
                        $config['level'] ?? Logger::DEBUG,
                        true,
                        $config['file_permission']
                    )
                );

                break;
            case SlackWebhookHandler::class:
                $logger->pushHandler(
                    new SlackWebhookHandler(
                        $config['webhook'],
                        null,
                        null,
                        true,
                        null,
                        false,
                        true,
                        $config['level'] ?? Logger::ERROR,
                        array_key_exists('bubble', $config) ? $config['bubble'] : true,
                        $config['excludeFields'] ?? [] // Fields to exclude
                    )
                );
                break;
        }
    }
}