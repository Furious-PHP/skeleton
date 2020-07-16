<?php

use App\Http\Middleware\ErrorHandler;
use App\Http\Middleware\NotFoundHandler;
use Framework\Http\Application;
use Framework\Http\Pipeline\FuriousPipelineAdapter;
use Framework\Http\Pipeline\MiddlewarePipeInterface;
use Framework\Http\Pipeline\MiddlewareResolver;
use Framework\Http\Psr7\FuriousResponseFactory;
use Framework\Http\Psr7\ResponseFactory;
use Framework\Http\Router\FuriousRouterAdapter;
use Framework\Http\Router\Router;

/** @var Container $container */

use Furious\Container\Container;

### Framework

$container->set(Router::class, function (Container $container) {
    return $container->get(FuriousRouterAdapter::class);
});

$container->set(MiddlewareResolver::class, function (Container $container) {
    return new MiddlewareResolver($container);
});

$container->set(Application::class, function (Container $container) {
    return new Application(
        $container->get(MiddlewareResolver::class),
        $container->get(Router::class),
        $container->get(NotFoundHandler::class),
        $container->get(FuriousPipelineAdapter::class)
    );
});

### App

$container->set(ResponseFactory::class, function (Container $container) {
    return $container->get(FuriousResponseFactory::class);
});

$container->set(ErrorHandler::class, function (Container $container) {
    return new ErrorHandler(
        $container->get(ResponseFactory::class),
        boolval($container->get('config')['debug'])
    );
});