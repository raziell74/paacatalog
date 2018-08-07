<?php

use Phpmig\Migration\Migration;

class ExpandSectionNameColumn extends Migration {
    public function init() {
        parent::init();
        $container = $this->getContainer();
        $this->db = $container['db'];
    }

    public function up() {
        $sql = "ALTER TABLE `sections` MODIFY `name` VARCHAR(75)";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "ALTER TABLE `sections` MODIFY `name` VARCHAR(25)";
        $this->db->query($sql);
    }
}