<?php

declare(strict_types=1);

namespace App\Http\Action;

use Framework\Http\Psr7\ResponseFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class HomeAction implements RequestHandlerInterface
{
    private ResponseFactory $response;

    /**
     * HomeAction constructor.
     * @param ResponseFactory $response
     */
    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $name = $request->getQueryParams()['name'] ?? 'guest';

        $message = 'Hello, ' . $name . '!';

        return $this->response->json([
            'content' => $message
        ]);
    }
}