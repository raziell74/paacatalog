<?php
use Slim\Views\PhpRenderer;

$container = $app->getContainer();

/**
 * Php Template Renderer
 * 
 * @usage	$this->view->render($response, "/hello.php", $args);
 */
$container['view'] = new PhpRenderer(__DIR__ . "/views");
$container['images_dir'] = __DIR__ . '/../public/images';

/**
 * MonoLog Logging service
 *
 * @usage	$this->logger->addInfo("[LOGGED INFORMATION]");
 */
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

/**
 * Database Service
 */
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO(
        'mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
        $db['user'], $db['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};