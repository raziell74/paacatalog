<?php

use Phpmig\Migration\Migration;

class InitSectionsTable extends Migration
{
    public function init() {
        parent::init();
        $container = $this->getContainer();
        $this->db = $container['db'];
    }

    public function up() {
        $sql = "CREATE TABLE `sections` (
                                `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                `name` VARCHAR(25) COLLATE utf8_unicode_ci NOT NULL,
                                `short_desc` TEXT NULL DEFAULT NULL,
                                `description` TEXT NULL DEFAULT NULL,
                                `background_image` VARCHAR(255) NULL DEFAULT NULL,
                                `hidden` TINYINT(1) DEFAULT 0,
                                PRIMARY KEY (`id`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "DROP TABLE `sections`";
        $this->db->query($sql);
    }
}