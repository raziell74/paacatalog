<?php

use Phpmig\Migration\Migration;

class AddSortOrderToSections extends Migration {
    public function init() {
        parent::init();
        $container = $this->getContainer();
        $this->db = $container['db'];
    }

    public function up() {
        $sql = "ALTER TABLE `sections` ADD COLUMN `sort_order` INT(10) NULL";
        $this->db->query($sql);

        $statement = $this->db->prepare("SELECT `id` FROM `sections`");
        $statement->execute();
        $sections = $statement->fetchAll();

        foreach($sections as $index => $section) {
            $sql = "
                UPDATE
                    `sections`
                SET
                    sort_order = :order_index
                WHERE
                    id = :section_id
            ";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':section_id', $section['id']);
            $statement->bindParam(':order_index', $index);
            $statement->execute();
        }
    }

    public function down() {
        $sql = "ALTER TABLE `sections` DROP COLUMN `sort_order`";
        $this->db->query($sql);
    }
}