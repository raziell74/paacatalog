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
        $this->processImages($request, $product);
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
        $this->processImages($request, $product);
        return $response->withRedirect('/#' . $product->cssId);
    }

    public function deleteProduct(Request $request, Response $response, $args) {
        $productsTable = new productsTable($this->container);
        $product = $productsTable->get($args['id']);
        $product->delete();
        return $response->withRedirect('/');
    }

    public function deleteProductImage(Request $request, Response $response, $args) {
        $imagesTable = new product_imagesTable($this->container);
        $image = $imagesTable->get($args['id']);
        $image->delete();
        return $response->withRedirect('/');
    }

    public function setProductMainImage(Request $request, Response $response, $args) {
        $imagesTable = new product_imagesTable($this->container);
        $image = $imagesTable->get($args['id']);
        $image->setAsMainImage();
        return $response->withRedirect('/');
    }

    public function swapProductOrder(Request $request, Response $response, $args) {
        $productsTable = new productsTable($this->container);
        $productsTable->swapProductOrder($args['first_product_id'], $args['second_product_id']);
        return $response->withRedirect('/');
    }

    private function processImages(Request $request, $product) {
        $uploaded_files = $request->getUploadedFiles();
        if(empty($uploaded_files)) return;

        $images_table = new product_imagesTable($this->container);
        $image_files = $uploaded_files['images'];
        unset($image_files[count($image_files) - 1]);

        foreach($image_files as $index => $image_file) {
            if($image_file->getError() === UPLOAD_ERR_OK) {
                $filename = $this->moveUploadedFile($this->imagesDir, $image_file);
                $data = [
                    'url' => "/images/" . $filename,
                    'encoded_image' => $this->getEncodedImage($this->imagesDir . "/" . $filename),
                    'product_id' => $product->id
                ];

                $image = $images_table->addProductImage($data);

                if($index == 0) {
                    $image->setAsMainImage();
                }
            }
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