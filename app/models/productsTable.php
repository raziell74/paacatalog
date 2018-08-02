<?php
namespace App\Models;

class productsTable extends Model {
    public function getAll() {
        $statement = $this->db->query("SELECT * FROM products");
        $products = $this->fetchAsProductObjs($statement->fetchAll());
        return $products;
    }

    public function getBySection($section_id) {
        $statement = $this->db->prepare("
            SELECT
                *
            FROM
                products
            WHERE
                section_id = :section_id
        ");
        $statement->bindParam(':section_id', $section_id);
        $statement->execute();
        $products = $this->fetchAsProductObjs($statement->fetchAll());
        return $products;
    }

    public function getProduct($product_id) {
        $statement = $this->db->prepare("
            SELECT
                *
            FROM
                products
            WHERE
                id = :product_id
        ");
        $statement->bindParam(':product_id', $product_id);
        $statement->execute();
        $products = $this->fetchAsProductObjs($statement->fetchAll());
        return $products[0] ?? null;
    }

    private function fetchAsProductObjs($raw_products) {
        $products = [];
        foreach($raw_products as $product_data) {
            $products[] = new product($this->container, $product_data);
        }

        return $products;
    }
}