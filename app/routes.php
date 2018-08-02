<?php
namespace App;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', Controllers\Admin::class . ':home');

$app->get('/delete/section/{id}', Controllers\Admin::class . ':deleteSection');
$app->post('/save/section/{id}', Controllers\Admin::class . ':updateSection');
$app->post('/add/section', Controllers\Admin::class . ':addSection');

$app->get('/sample', Controllers\Preview::class . ':index');