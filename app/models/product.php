<?php
namespace App\Models;

class product extends Model {
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
        $this->db->query("DELETE FROM images WHERE product_id=" . $this->get('id'));
        $this->db->query("DELETE FROM products WHERE id=" . $this->get('id'));
        return true;
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