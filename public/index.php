<?php

declare(strict_types=1);

use Framework\Http\Application;
use Furious\HttpRunner\Runner;
use Furious\Psr7\Factory\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$container = require 'config/container.php';
$config = $container->get('config');

/** @var Application $app */
$app = $container->get(Application::class);

require 'config/pipeline.php';
require 'config/routes.php';

$request = (new ServerRequestFactory)->fromGlobals();
$response = $app->handle($request);

$response =
    $response->withHeader('X-Developer', 'Arslanoov');

$runner = new Runner();
$runner->run($response);