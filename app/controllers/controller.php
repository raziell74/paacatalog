<?php
namespace App\Controllers;

class controller {
    protected $logger;
    protected $view;
    protected $container;
    protected $imagesDir;

    public function __construct(\Slim\Container $container) {
        $this->container = $container;
        $this->logger = $this->container['logger'];
        $this->view = $this->container['view'];
        $this->imagesDir = $this->container['images_dir'];
    }

    protected function moveUploadedFile($directory, $file) {
        $path_parts = pathinfo($file->getClientFilename());
        $extension =  $path_parts['extension'];
        $basename =  $path_parts['filename'] . '-' . bin2hex(random_bytes(8));
        $filename = sprintf('%s.%0.8s', $basename, $extension);
        $file->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
        return $filename;
    }
}