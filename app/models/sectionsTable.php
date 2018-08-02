<?php
namespace App\Models;

class sectionsTable extends Model {
    public function getAll() {
        $statement = $this->db->query("SELECT * FROM sections");
        $sections = $this->fetchAsSections($statement->fetchAll());
        return $sections;
    }

    private function fetchAsSections($raw_sections) {
        $sections = [];
        foreach($raw_sections as $section_data) {
            $sections[] = new section($this->container, $section_data);
        }

        return $sections;
    }
}