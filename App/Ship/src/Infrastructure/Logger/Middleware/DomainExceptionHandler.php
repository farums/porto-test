<?php

declare(strict_types=1);

namespace Packages\Porto\Core\Logger\Middleware;

use DomainException;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\{
    Message\ResponseInterface,
    Message\ServerRequestInterface,
    Server\MiddlewareInterface,
    Server\RequestHandlerInterface,
};
use Psr\Log\LoggerInterface;

class DomainExceptionHandler implements MiddlewareInterface {
    public function __construct(private LoggerInterface $logger) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        try {
            return $handler->handle($request);
        }
        catch (DomainException $exception) {
            if (getenv('APP_ENV') != "test") {
                $this->logger->warning($exception->getMessage(), [
                    'exception' => $exception,
                    'request'   => self::extractRequest($request),
                ]);
            }

            return new JsonResponse([$exceptionMessage], 422);
        }
    }

    private static function extractRequest(ServerRequestInterface $request): array {
        return [
            'method'  => $request->getMethod(),
            'url'     => (string) $request->getUri(),
            'server'  => $request->getServerParams(),
            'cookies' => $request->getCookieParams(),
            'body'    => $request->getParsedBody(),
        ];
    }
}