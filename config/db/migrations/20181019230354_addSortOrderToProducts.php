<?php

use Phpmig\Migration\Migration;

class AddSortOrderToProducts extends Migration {
    public function init() {
        parent::init();
        $container = $this->getContainer();
        $this->db = $container['db'];
    }

    public function up() {
        $sql = "ALTER TABLE `products` ADD COLUMN `sort_order` INT(10) NULL";
        $this->db->query($sql);

        $statement = $this->db->prepare("SELECT `id`, `section_id` FROM `products` ORDER BY `section_id`");
        $statement->execute();
        $products = $statement->fetchAll();

        $currentSection = 0;
        $orderIndex = 0;
        foreach($products as $product) {
            if($currentSection != $product['section_id']) {
              $orderIndex = 0;
              $currentSection = $product['section_id'];
            }
            $sql = "
                UPDATE
                    `products`
                SET
                    sort_order = :order_index
                WHERE
                    id = :product_id
            ";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':product_id', $product['id']);
            $statement->bindParam(':order_index', $orderIndex);
            $statement->execute();
            $orderIndex++;
        }
    }

    public function down() {
        $sql = "ALTER TABLE `products` DROP COLUMN `sort_order`";
        $this->db->query($sql);
    }
}