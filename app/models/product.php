<?php
namespace App\Models;

class product extends Model {
    private $data;
    public $default_image = "https://www.paa-automation.com/wp-content/themes/paa-theme/assets/img/paa-automation-logo.png";
    private $images_table;

    protected function init($data) {
        $this->images_table = new product_imagesTable($this->container);
        foreach($data as $key => $value) {
            $this->data[$key] = $value;
        }
        $this->data['main_image'] = $this->images_table->getMainImage($this->data['id']);
        $this->data['images'] = $this->images_table->getImages($this->data['id']);
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
        $this->db->query("DELETE FROM products WHERE id=" . $this->get('id'));
        return true;
    }

    public function update() {
        $sql = "
            UPDATE
                products
            SET
                name = :name,
                overview = :overview,
                specs = :specs,
                tech = :tech
            WHERE
                id = :id
        ";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->get('id'));
        $statement->bindParam(':name', $this->get('name'));
        $statement->bindParam(':overview', $this->get('overview'));
        $statement->bindParam(':specs', $this->get('specs'));
        $statement->bindParam(':tech', $this->get('tech'));
        $statement->execute();
        return $this;
    }

    public function create() {
        $sql = "
            INSERT INTO
                products (`section_id`, `name`, `overview`, `specs`, `tech`)
            VALUES (
                :section_id,
                :name,
                :overview,
                :specs,
                :tech
            );
        ";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':section_id', $this->get('section_id'));
        $statement->bindParam(':name', $this->get('name'));
        $statement->bindParam(':overview', $this->get('overview'));
        $statement->bindParam(':specs', $this->get('specs'));
        $statement->bindParam(':tech', $this->get('tech'));
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $this->set('id', $result['id']);
        return $this;
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