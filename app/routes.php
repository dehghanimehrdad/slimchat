<?php

declare(strict_types=1);

use App\Application\Actions\Message\ListMessagesAction;
use App\Application\Actions\Message\SendMessageAction;
use App\Application\Actions\User\LoginUserAction;
use App\Application\Actions\User\RegisterUserAction;
use App\Application\Middleware\AuthMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/auth', function (Group $group) {
        $group->post('/register', RegisterUserAction::class);
        $group->post('/login', LoginUserAction::class);
    });

    $app->group('/messages', function (Group $group) {
        $group->get('', ListMessagesAction::class);
        $group->post('', SendMessageAction::class);
    })->add(AuthMiddleware::class);

};
