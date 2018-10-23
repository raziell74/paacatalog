<?php
namespace App\Models;

class sectionsTable extends Model {
    public function getAll() {
        $statement = $this->db->query("SELECT * FROM sections ORDER BY sort_order ASC");
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

    public function swapSectionOrder($firstSectionId, $secondSectionId) {
        $statement = $this->db->prepare("
            SELECT
                id,
                sort_order
            FROM
                sections
            WHERE
                id IN (:first_section_id, :second_section_id)
            ORDER BY
              sort_order ASC
        ");
        $statement->bindParam(':first_section_id', $firstSectionId);
        $statement->bindParam(':second_section_id', $secondSectionId);
        $statement->execute();

        $sections = $statement->fetchAll();
        $firstSectionNewSortOrder = $sections[1]['sort_order'];
        $secondSectionNewSortOrder = $sections[0]['sort_order'];

        $statement = $this->db->prepare("
            UPDATE
                sections
            SET
                sort_order=:first_new_sort_order
            WHERE
                id = :first_section_id
        ");
        $statement->bindParam(':first_section_id', $firstSectionId);
        $statement->bindParam(':first_new_sort_order', $firstSectionNewSortOrder);
        $statement->execute();

        $statement = $this->db->prepare("
            UPDATE
                sections
            SET
                sort_order=:second_new_sort_order
            WHERE
                id = :second_section_id
        ");
        $statement->bindParam(':second_section_id', $secondSectionId);
        $statement->bindParam(':second_new_sort_order', $secondSectionNewSortOrder);
        $statement->execute();

        return true;
    }

    public function addSection($data) {
        $section = new section($this->container, $data);
        $section->create();
        return $section;
    }

    private function fetchAsSectionObjs($raw_sections) {
        $sections = [];
        foreach($raw_sections as $section_data) {
            $sections[] = new section($this->container, $section_data);
        }

        return $sections;
    }
}