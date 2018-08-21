<?php
namespace App\Models;

class product_imagesTable extends Model {
    public function getAll() {
        $statement = $this->db->query("SELECT * FROM product_images");
        $images = $this->fetchAsImageObjs($statement->fetchAll());
        return $images;
    }

    public function getImages($product_id) {
        $statement = $this->db->prepare("
            SELECT
                *
            FROM
                product_images
            WHERE
                product_id = :product_id
            ORDER BY
                main_image DESC
        ");
        $statement->bindParam(':product_id', $product_id);
        $statement->execute();
        $images = $this->fetchAsImageObjs($statement->fetchAll());
        return $images;
    }

    public function getMainImage($product_id) {
        $statement = $this->db->prepare("
            SELECT
                *
            FROM
                product_images
            WHERE
                product_id = :product_id AND
                main_image = 1
        ");
        $statement->bindParam(':product_id', $product_id);
        $statement->execute();
        $images = $this->fetchAsImageObjs($statement->fetchAll());
        return $images[0] ?? null;
    }

    public function get($image_id) {
        $statement = $this->db->prepare("
            SELECT
                *
            FROM
                product_images
            WHERE
                id = :image_id
        ");
        $statement->bindParam(':image_id', $image_id);
        $statement->execute();
        $images = $this->fetchAsImageObjs($statement->fetchAll());
        return $images[0] ?? null;
    }

    public function addProductImage($data) {
        $image = new product_image($this->container, $data);
        $image->create();
        return $image;
    }

    private function fetchAsImageObjs($raw_images) {
        $images = [];
        foreach($raw_images as $image_data) {
            $images[] = new product_image($this->container, $image_data);
        }

        return $images;
    }
}