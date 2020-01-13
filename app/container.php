<?php
use DI\Container;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$container = new Container;

$container->set('twig', function () {
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../resources/views");
    return new \Twig\Environment($loader, ['cache' => false]);
});

$container->set('pdo', function () {
    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
   return new PDO("mysql:host={$host};dbname={$dbname}", $user);
});

$container->set('config', function () {
    return [
        'environment' => getenv('APP_ENV')
    ];
});

$container->set('log', function () {
    $log = new Logger('slim');
    $log->pushHandler(new StreamHandler(__DIR__ . '/../logs/log.php', Logger::WARNING));
    return $log;
});
