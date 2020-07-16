<?php

use Furious\Container\Container;

$container = new Container();

require __DIR__ . '/dependencies.php';

$container->set('config', require __DIR__ . '/params.php');

return $container;