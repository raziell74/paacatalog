<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("PAA Catalog Administration");

    return $response;
});

$app->get('/sample', function (Request $request, Response $response, array $args) {
    $sampleHtml = file_get_contents("catalog_sample.html");
    $response->getBody()->write($sampleHtml);
    $this->logger->addInfo('Sample Viewed');

    return $response;
});