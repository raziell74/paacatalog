<?php
namespace App;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', Controllers\Admin::class . ':home');

$app->get('/delete/section/{id}', Controllers\Section::class . ':deleteSection');
$app->post('/save/section/{id}', Controllers\Section::class . ':updateSection');
$app->post('/add/section', Controllers\Section::class . ':addSection');

$app->get('/delete/product/{id}', Controllers\Product::class . ':deleteProduct');
$app->post('/save/product/{id}', Controllers\Product::class . ':updateProduct');
$app->post('/add/product', Controllers\Product::class . ':addProduct');

$app->get('/sample', Controllers\Preview::class . ':index');

$app->get('/download', Controllers\Admin::class . ':download');