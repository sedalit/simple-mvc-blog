<?php

/** @var PHPFramework\Application $app */

use App\Controllers\IndexController;
use App\Controllers\PostController;
use App\Controllers\CategoryController;

$app->router()->get('/', [IndexController::class, 'index']);
$app->router()->get('/post/(?P<slug>[a-z0-9-]+)', [PostController::class, 'show']);
$app->router()->get('/category/(?P<slug>[a-z0-9-]+)', [CategoryController::class, 'show']);