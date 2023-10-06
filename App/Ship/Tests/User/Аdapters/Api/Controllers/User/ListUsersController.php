<?php

namespace ShipTest\User\Аdapters\Api\Controllers\User;

use App\QueryHandlers\User\ListUsersQueryHandler;
use App\Queries\User\ListUsersQuery;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\JsonResponse;

class ListUsersController implements RequestHandlerInterface {
    public function __construct(private ListUsersQueryHandler $queryHandler) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface {
        $query = new ListUsersQuery();
        $users = $this->queryHandler->handle($query);
        return new JsonResponse(['users' => $users]);
    }
}