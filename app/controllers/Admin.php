<?php
namespace App\Controllers;
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Models\sectionsTable;

class Admin  extends controller {
    public function home(Request $request, Response $response) {
        $sections = new sectionsTable($this->container);
        $vars = [
            'is_admin' => true,
            'sections' => $sections->getAll()
        ];
        return $this->view->render($response, "/catalog.php", $vars);
    }

    public function download(Request $request, Response $response) {
        $sections = new sectionsTable($this->container);
        $vars = [
            'is_admin' => false,
            'sections' => $sections->getAll()
        ];
        $view = $this->view->render($response, "/catalog.php", $vars);
        $downloadResponse = $response->withAddedHeader('Content-disposition', 'attachment; filename=PAA-Catalog.html');
        return $downloadResponse;
    }
}