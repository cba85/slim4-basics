<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Container
require __DIR__ . '/../app/container.php';
AppFactory::setContainer($container);

// App
$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

// Routes
require __DIR__ . '/../routes/web.php';

$app->run();
