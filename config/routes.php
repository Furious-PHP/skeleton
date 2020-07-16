<?php

use Framework\Http\Application;
use App\Http\Action;

/** @var Application $app */

$app->get('home', '/', Action\HomeAction::class);
$app->get('about', '/about', Action\AboutAction::class);
