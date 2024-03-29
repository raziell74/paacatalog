<?php

require '../vendor/autoload.php';
require '../config/settings.php';

$app = new \Slim\App(['settings' => $config]);

require '../app/services.php';
require '../app/routes.php';

$app->run();