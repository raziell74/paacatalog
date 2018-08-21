<?php
namespace App\Models;

class product_image extends Model {
    private $data;

    protected function init($data) {
        foreach($data as $key => $value) {
            $this->data[$key] = $value;
        }
        $this->setCssId();
        return $this;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function get($key) {
        return $this->data[$key] ?? null;
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
        return $this;
    }

    public function delete() {
        unlink(__DIR__ . "/../.." . $this->get('url'));
        $this->db->query("DELETE FROM product_images WHERE id=" . $this->get('id'));
        return true;
    }

    public function toggleAsMainImage() {
        $this->db->query("
            UPDATE
                `product_images`
            SET
                `main_image` = 0
            WHERE
                product_id = " . $this->get('product_id')
        );
        $this->db->query("
            UPDATE
                `product_images`
            SET
                `main_image` = 1
            WHERE
                id = " . $this->get('id')
        );
        return $this;
    }

    public function create() {
        $sql = "
            INSERT INTO
                product_images (`product_id`, `url`, `encoded_image`, `main_image`)
            VALUES (
                :product_id,
                :url,
                :encoded_image,
                :main_image
            );
        ";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':product_id', $this->get('product_id'));
        $statement->bindParam(':url', $this->get('url'));
        $statement->bindParam(':encoded_image', $this->get('encoded_image'));
        $statement->bindParam(':main_image', $this->get('main_image'));
        $statement->execute();
        return $this;
    }

    private function setCssId() {
        $cssId = 'product-image-' . $this->get('id');
        $cssId = strtolower($cssId);
        $cssId = preg_replace("/[^a-z0-9_\s-]/", "", $cssId);
        $cssId = preg_replace("/[\s-]+/", " ", $cssId);
        $cssId = preg_replace("/[\s_]/", "-", $cssId);
        $this->set('cssId', $cssId);
        return $this;
    }
}