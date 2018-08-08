<?php
namespace App\Controllers;
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Models\productsTable;

class Product  extends controller {
    public function addProduct(Request $request, Response $response) {
        $productsTable = new productsTable($this->container);
        $data = $request->getParsedBody();
        $productsTable->addProduct($data);
        return $response->withRedirect('/#' . $product->cssId);
    }

    public function updateProduct(Request $request, Response $response, $args) {
        $productsTable = new productsTable($this->container);
        $product = $productsTable->get($args['id']);
        $data = $request->getParsedBody();
        foreach($data as $key => $value) {
            $product->set($key, $value);
        }
        $product->update();
        return $response->withRedirect('/#' . $product->cssId);
    }

    public function deleteProduct(Request $request, Response $response, $args) {
        $productsTable = new productsTable($this->container);
        $product = $productsTable->get($args['id']);
        $product->delete();
        return $response->withRedirect('/');
    }
}