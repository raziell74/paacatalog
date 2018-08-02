<?php
namespace App;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', Controllers\Admin::class . ':home');

$app->get('/delete/section/{id}', Controllers\Admin::class . ':deleteSection');
$app->post('/save/section/{id}', Controllers\Admin::class . ':updateSection');
$app->post('/add/section', Controllers\Admin::class . ':addSection');

$app->get('/delete/product/{id}', Controllers\Admin::class . ':deleteProduct');
$app->post('/save/product/{id}', Controllers\Admin::class . ':updateProduct');
$app->post('/add/product', Controllers\Admin::class . ':addProduct');

$app->get('/sample', Controllers\Preview::class . ':index');

$app->get('/download', Controllers\Admin::class . ':download');