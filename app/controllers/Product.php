<?php
namespace App\Controllers;
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Models\productsTable;
use App\Models\product_imagesTable;

class Product  extends controller {
    public function addProduct(Request $request, Response $response) {
        $productsTable = new productsTable($this->container);
        $data = $request->getParsedBody();
        $product = $productsTable->addProduct($data);
        $this->processMainImage($request, $product);
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
        $this->processMainImage($request, $product);
        return $response->withRedirect('/#' . $product->cssId);
    }

    public function deleteProduct(Request $request, Response $response, $args) {
        $productsTable = new productsTable($this->container);
        $product = $productsTable->get($args['id']);
        $product->delete();
        return $response->withRedirect('/');
    }

    private function processMainImage(Request $request, $product) {
        $data = [];
        $uploaded_files = $request->getUploadedFiles();
        $main_image_file = $uploaded_files['main_image'];

        if(!empty($uploaded_files) && $main_image_file->getError() === UPLOAD_ERR_OK) {
            $filename = $this->moveUploadedFile($this->imagesDir, $main_image_file);
            $imagesTable = new product_imagesTable($this->container);
            $data['url'] = "/images/" . $filename;
            $data['encoded_image'] = $this->getEncodedImage($this->imagesDir . "/" . $filename);
            $data['product_id'] = $product->id;
            $image = $imagesTable->addProductImage($data);
            $image->toggleAsMainImage();
        }
    }

    private function getEncodedImage($file_location) {
        $path_parts = pathinfo($file_location);
        $extension =  $path_parts['extension'];
        $image_data = file_get_contents($file_location);
        $encoded_data = base64_encode($image_data);
        return "data:image/$extension;base64,$encoded_data";
    }
}