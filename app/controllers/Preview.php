<?php
namespace App\Controllers;

class Preview {
    protected $logger;

    public function __construct(\Slim\Container $container) {
        $this->logger = $container['logger'];
    }
    
    public function index(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $sampleHtml = file_get_contents("catalog_sample.html");
        $response->getBody()->write($sampleHtml);
        $this->logger->addInfo('Sample Viewed');

        return $response;
    }
}