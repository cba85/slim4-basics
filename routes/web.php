<?php

$app->get('/', 'App\Controllers\HomeController:index');
$app->get('/hello/{name}', 'App\Controllers\HomeController:hello');

$app->get('/users', 'App\Controllers\UserController:index');