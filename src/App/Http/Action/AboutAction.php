<?php

declare(strict_types=1);

namespace App\Http\Action;

use Framework\Http\Psr7\ResponseFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class AboutAction implements RequestHandlerInterface
{
    private ResponseFactory $factory;

    /**
     * AboutAction constructor.
     * @param ResponseFactory $factory
     */
    public function __construct(ResponseFactory $factory)
    {
        $this->factory = $factory;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->factory->json([
            'content' => 'This is about page! :)'
        ]);
    }
}