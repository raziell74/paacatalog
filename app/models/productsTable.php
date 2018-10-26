<?php
namespace App\Models;

class productsTable extends Model {
    public function getAll() {
        $statement = $this->db->query("SELECT * FROM products ORDER BY sort_order ASC");
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
            ORDER BY
              sort_order ASC
        ");
        $statement->bindParam(':section_id', $section_id);
        $statement->execute();
        $products = $this->fetchAsProductObjs($statement->fetchAll());
        return $products;
    }

    public function get($product_id) {
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

    public function addProduct($data) {
        $product = new product($this->container, $data);
        $product->create();
        return $product;
    }

    public function swapProductOrder($firstProductId, $secondProductId) {
        $statement = $this->db->prepare("
            SELECT
                id,
                sort_order
            FROM
                products
            WHERE
                id IN (:first_product_id, :second_product_id)
            ORDER BY
              sort_order ASC
        ");
        $statement->bindParam(':first_product_id', $firstProductId);
        $statement->bindParam(':second_product_id', $secondProductId);
        $statement->execute();

        $products = $statement->fetchAll();
        $firstProductNewSortOrder = $products[1]['sort_order'];
        $secondProductNewSortOrder = $products[0]['sort_order'];

        $statement = $this->db->prepare("
            UPDATE
                products
            SET
                sort_order=:first_new_sort_order
            WHERE
                id = :first_product_id
        ");
        $statement->bindParam(':first_product_id', $firstProductId);
        $statement->bindParam(':first_new_sort_order', $firstProductNewSortOrder);
        $statement->execute();

        $statement = $this->db->prepare("
            UPDATE
                products
            SET
                sort_order=:second_new_sort_order
            WHERE
                id = :second_product_id
        ");
        $statement->bindParam(':second_product_id', $secondProductId);
        $statement->bindParam(':second_new_sort_order', $secondProductNewSortOrder);
        $statement->execute();

        return true;
    }

    private function fetchAsProductObjs($raw_products) {
        $products = [];
        foreach($raw_products as $product_data) {
            $products[] = new product($this->container, $product_data);
        }

        return $products;
    }
}