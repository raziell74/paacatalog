<?php

use Phpmig\Migration\Migration;

class MoveImagesToProductsTableColumn extends Migration {
    public function init() {
        parent::init();
        $container = $this->getContainer();
        $this->db = $container['db'];
    }

    public function up() {
        $sql = "DROP TABLE `images`";
        $this->db->query($sql);

        $sql = "ALTER TABLE `products` ADD `images` TEXT NULL DEFAULT NULL";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "CREATE TABLE `images` (
                                `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                `product_id` INT UNSIGNED NOT NULL,
                                `url` TEXT NULL DEFAULT NULL,
                                `main_image` TINYINT(1) DEFAULT 0,
                                `hidden` TINYINT(1) DEFAULT 0,
                                PRIMARY KEY (`id`),
                                FOREIGN KEY (product_id) REFERENCES products(id)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $this->db->query($sql);
    }
}