<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use App\Domain\User\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class AuthMiddleware implements Middleware
{
    /**
     * {@inheritdoc}
     */
    public function process(Request $request, RequestHandler $handler): Response
    {
        
        if (isset($request->getHeader('Authorization')[0])) {
            $token = $request->getHeader('Authorization')[0];
            if(User::where('token', $token)->count()){
                return $handler->handle($request);
            }
        }

        die(403);
    }
}
