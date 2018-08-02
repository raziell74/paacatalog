<?php

use Phpmig\Migration\Migration;

class AddProductsTable extends Migration {
    public function init() {
        parent::init();
        $container = $this->getContainer();
        $this->db = $container['db'];
    }

    public function up() {
        $sql = "CREATE TABLE `products` (
                                `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                `section_id` INT UNSIGNED NOT NULL,
                                `name` VARCHAR(75) COLLATE utf8_unicode_ci NOT NULL,
                                `overview` TEXT NULL DEFAULT NULL,
                                `specs` TEXT NULL DEFAULT NULL,
                                `tech` TEXT NULL DEFAULT NULL,
                                `main_image` VARCHAR(255) NOT NULL DEFAULT '/images/Blue-Robot.png',
                                `hidden` TINYINT(1) DEFAULT 0,
                                PRIMARY KEY (`id`),
                                FOREIGN KEY (section_id) REFERENCES sections(id)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "DROP TABLE `products`";
        $this->db->query($sql);
    }
}