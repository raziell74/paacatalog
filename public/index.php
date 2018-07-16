<?php

require '../vendor/autoload.php';

require '../config/settings.php';
$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

require '../app/routes.php';

$app->run();