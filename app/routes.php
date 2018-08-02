<?php
namespace App;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', Controllers\Admin::class . ':home');
$app->post('/', Controllers\Admin::class . ':post');
$app->get('/preview', Controllers\Preview::class . ':index');