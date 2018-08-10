<?php
namespace App\Models;

class Model {
    protected $container;
    protected $db;
    protected $logger;

    public function __construct(\Slim\Container $container, $data = []) {
        $this->container = $container;
        $this->db = $this->container['db'];
        $this->logger = $this->container['logger'];
        $this->init($data);
    }

    protected function init($data) {
        
    }
}