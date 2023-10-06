<?php
namespace ShipTest\Tests;

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use PHPUnit\Framework\TestCase;
use Laminas\ServiceManager\ServiceManager;

class LoggerTest extends TestCase {

    protected ServiceManager $serviceManager;
    protected LoggerInterface $logger;
    public function setUp(): void {
        $this->serviceManager = new ServiceManager();
        $logger               = new Logger('Ship');
        $this->serviceManager->setService(LoggerInterface::class, $logger);
    }

    public function testLogger() {
        // Получаем сервис логгера из контейнера зависимостей
        $logger = $this->serviceManager->get(LoggerInterface::class);
        // Проверяем, что полученный объект является экземпляром Logger
        $this->assertInstanceOf(Logger::class, $logger);
    }
}