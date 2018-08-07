<?php
namespace App\Controllers;
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Models\sectionsTable;
use App\Models\productsTable;

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
        $newResponse = $response->withAddedHeader('Content-disposition', 'attachment; filename=PAA-Catalog.html');
        return $newResponse;
    }

    public function deleteSection(Request $request, Response $response, $args = []) {
        $sectionsTable = new sectionsTable($this->container);
        $section = $sectionsTable->get($args['id']);
        $section->delete();
        return $response->withRedirect('/');
    }

    public function updateSection(Request $request, Response $response, $args = []) {
        $sectionsTable = new sectionsTable($this->container);
        $section = $sectionsTable->get($args['id']);
        $data = $request->getParsedBody();
        foreach($data as $key => $value) {
            $section->set($key, $value);
        }
        $section->update();
        return $response->withRedirect('/#' . $section->cssId);
    }

    public function addSection(Request $request, Response $response, $args = []) {
        $sectionsTable = new sectionsTable($this->container);
        $data = $request->getParsedBody();
        $sectionsTable->addSection($data);
        return $response->withRedirect('/#' . $section->cssId);
    }

    public function deleteProduct(Request $request, Response $response, $args = []) {
        $productsTable = new productsTable($this->container);
        $product = $productsTable->get($args['id']);
        $product->delete();
        return $response->withRedirect('/');
    }

    public function updateProduct(Request $request, Response $response, $args = []) {
        $productsTable = new productsTable($this->container);
        $product = $productsTable->get($args['id']);
        $data = $request->getParsedBody();
        foreach($data as $key => $value) {
            $product->set($key, $value);
        }
        $product->update();
        return $response->withRedirect('/#' . $product->cssId);
    }

    public function addProduct(Request $request, Response $response, $args = []) {
        $productsTable = new productsTable($this->container);
        $data = $request->getParsedBody();
        $productsTable->addProduct($data);
        return $response->withRedirect('/#' . $product->cssId);
    }
}