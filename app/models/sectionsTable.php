<?php
namespace App\Models;

class sectionsTable extends Model {
    public function getAll() {
        $statement = $this->db->query("SELECT * FROM sections");
        $sections = $this->fetchAsSectionObjs($statement->fetchAll());
        return $sections;
    }

    public function get($section_id) {
        $statement = $this->db->prepare("
            SELECT
                *
            FROM
                sections
            WHERE
                id = :section_id
        ");
        $statement->bindParam(':section_id', $section_id);
        $statement->execute();
        $sections = $this->fetchAsSectionObjs($statement->fetchAll());
        return $sections[0] ?? null;
    }

    private function fetchAsSectionObjs($raw_sections) {
        $sections = [];
        foreach($raw_sections as $section_data) {
            $sections[] = new section($this->container, $section_data);
        }

        return $sections;
    }
}