<?php
namespace App\Models;

class footerText extends Model {
    private $data;

    protected function init($data) {
        foreach($data as $key => $value) {
            $this->data[$key] = $value;
        }
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

    public function update() {
        $sql = "UPDATE footer_text SET text = :text WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->get('id'));
        $statement->bindParam(':text', $this->get('text'));
        $statement->execute();
        return $this;
    }
}