<?php
namespace App\Controllers;
use App\Models\sectionsTable;
use App\Models\productsTable;

class Admin  extends controller {
    public function home(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $sections = new sectionsTable($this->container);
        $vars = [
            'name' => 'Peak Analysis & Automation Catalog',
            'sections' => $sections->getAll()
        ];
        return $this->view->render($response, "/admin.php", $vars);
    }

    public function download(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $sections = new sectionsTable($this->container);
        $vars = [
            'name' => 'Peak Analysis & Automation Catalog',
            'sections' => $sections->getAll()
        ];
        $view = $this->view->render($response, "/catalog.php", $vars);
        $body = $view->getBody();
        file_put_contents(__DIR__ . "/../../public/downloads/catalog.html", $body);
        //$newResponse = $response->withAddedHeader('Content-disposition', 'attachment; filename=/downloads/catalog.html');
        return $newResponse;
    }

    public function deleteSection(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $sectionsTable = new sectionsTable($this->container);
        $section = $sectionsTable->get($args['id']);
        $section->delete();
        return $response->withRedirect('/');
    }

    public function updateSection(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $sectionsTable = new sectionsTable($this->container);
        $section = $sectionsTable->get($args['id']);
        $data = $request->getParsedBody();
        foreach($data as $key => $value) {
            $section->set($key, $value);
        }
        $section->update();
        return $response->withRedirect('/#' . $section->cssId);
    }

    public function addSection(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $sectionsTable = new sectionsTable($this->container);
        $data = $request->getParsedBody();
        $sectionsTable->addSection($data);
        return $response->withRedirect('/#' . $section->cssId);
    }

    public function deleteProduct(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $productsTable = new productsTable($this->container);
        $product = $productsTable->get($args['id']);
        $product->delete();
        return $response->withRedirect('/');
    }

    public function updateProduct(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $productsTable = new productsTable($this->container);
        $product = $productsTable->get($args['id']);
        $data = $request->getParsedBody();
        foreach($data as $key => $value) {
            $product->set($key, $value);
        }
        $product->update();
        return $response->withRedirect('/#' . $product->cssId);
    }

    public function addProduct(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $productsTable = new productsTable($this->container);
        $data = $request->getParsedBody();
        $productsTable->addProduct($data);
        return $response->withRedirect('/#' . $product->cssId);
    }
}