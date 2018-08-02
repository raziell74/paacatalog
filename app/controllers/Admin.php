<?php
namespace App\Controllers;
use App\Models\sectionsTable;

class Admin  extends controller {
    public function home(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $sections = new sectionsTable($this->container);
        $vars = [
            'name' => 'Peak Analysis & Automation Catalog',
            'sections' => $sections->getAll()
        ];
        return $this->view->render($response, "/admin.php", $vars);
    }

    public function post(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
       
    }
}