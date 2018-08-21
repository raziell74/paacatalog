<?php
namespace App\Models;

class section extends Model {
    private $data;

    protected function init($data) {
        foreach($data as $key => $value) {
            $this->data[$key] = $value;
        }
        $this->setCssId();
        return $this;
    }

    public function __get($name) {
        if($name == 'products') $this->hasProducts();
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
        if($key == 'products') $this->hasProducts();
        return $this->data[$key] ?? null;
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
        return $this;
    }

    public function delete() {
        $products = $this->get('products');
        foreach($products as $product) {
            $product->delete();
        }
        $this->db->query('DELETE FROM sections WHERE id=' . $this->get('id'));
        return true;
    }

    public function update() {
        $sql = "
            UPDATE
                sections
            SET
                name = :name,
                short_desc = :short_desc,
                description = :description,
                background_image = :background_image
            WHERE
                id = :id
        ";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->get('id'));
        $statement->bindParam(':name', $this->get('name'));
        $statement->bindParam(':short_desc', $this->get('short_desc'));
        $statement->bindParam(':description', $this->get('description'));
        $statement->bindParam(':background_image', $this->get('background_image'));
        $statement->execute();
        return $this;
    }

    public function create() {
        $sql = "
            INSERT INTO
                sections (`name`, `short_desc`, `description`, `background_image`)
            VALUES (
                :name,
                :short_desc,
                :description,
                :background_image
            );
        ";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':name', $this->get('name'));
        $statement->bindParam(':short_desc', $this->get('short_desc'));
        $statement->bindParam(':description', $this->get('description'));
        $statement->bindParam(':background_image', $this->get('background_image'));
        $statement->execute();
        $this->set('id', $this->db->lastInsertId());
        return $this;
    }

    public function hasProducts() {
        if(array_key_exists('products', $this->data)) return $this;
        $productsTable = new productsTable($this->container);
        $products = $productsTable->getBySection($this->get('id'));
        return $this->set('products', $products);
    }

    private function setCssId() {
        $cssId = $this->get('name') . '-' . $this->get('id');
        $cssId = strtolower($cssId);
        $cssId = preg_replace("/[^a-z0-9_\s-]/", "", $cssId);
        $cssId = preg_replace("/[\s-]+/", " ", $cssId);
        $cssId = preg_replace("/[\s_]/", "-", $cssId);
        $this->set('cssId', $cssId);
        return $this;
    }
}