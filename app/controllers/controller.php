<?php
namespace App\Controllers;

class controller {
    protected $logger;
    protected $view;
    protected $container;

    public function __construct(\Slim\Container $container) {
        $this->container = $container;
        $this->logger = $this->container['logger'];
        $this->view = $this->container['view'];
    }
}