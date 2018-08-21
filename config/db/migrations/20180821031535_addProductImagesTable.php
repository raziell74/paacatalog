<?php

use Phpmig\Migration\Migration;

class AddProductImagesTable extends Migration {
    public function init() {
        parent::init();
        $container = $this->getContainer();
        $this->db = $container['db'];
    }

    public function up() {
        $sql = "CREATE TABLE `product_images` (
                                `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                `product_id` INT UNSIGNED NOT NULL,
                                `url` TEXT NULL DEFAULT NULL,
                                `encoded_image` MEDIUMTEXT NOT NULL,
                                `main_image` TINYINT(1) DEFAULT 0,
                                `hidden` TINYINT(1) DEFAULT 0,
                                PRIMARY KEY (`id`),
                                FOREIGN KEY (product_id) REFERENCES products(id)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $this->db->query($sql);

        $this->migrateMainImagesToProductImages();

        $sql = "ALTER TABLE `products` DROP COLUMN `images`";
        $this->db->query($sql);

        $sql = "ALTER TABLE `products` DROP COLUMN `main_image`";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "ALTER TABLE `products` ADD `images` TEXT NULL DEFAULT NULL";
        $this->db->query($sql);

        $sql = "ALTER TABLE `products` ADD `main_image` VARCHAR(255) NULL DEFAULT NULL";
        $this->db->query($sql);
        
        $this->migrateMainImageUrlsToProducts();

        $sql = "DROP TABLE `product_images`";
        $this->db->query($sql);
    }

    protected function migrateMainImageUrlsToProducts() {
        $statement = $this->db->prepare("
            SELECT
                `product_id`,
                `url`
            FROM
                `product_images`
            WHERE
                `main_image` = 1
        ");
        $statement->execute();
        $products = $statement->fetchAll();

        foreach($main_image as $image_info) {
            $sql = "
                UPDATE
                    `products`
                SET
                    main_image = :image_url
                WHERE
                    id = :product_id
            ";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':product_id', $image_info['product_id']);
            $statement->bindParam(':image_url', $image_info['url']);
            $statement->execute();
        }
    }

    protected function migrateMainImagesToProductImages() {
        $statement = $this->db->prepare("
            SELECT
                `id`,
                `main_image`
            FROM
                `products`
        ");
        $statement->execute();
        $products = $statement->fetchAll();

        foreach($products as $product) {
            if(empty($product['main_image'])) continue;
            //encode image
            $path_parts = pathinfo($product['main_image']);
            $extension =  $path_parts['extension'];
            $basename =  $path_parts['filename'] . '-' . bin2hex(random_bytes(8));
            $filename = sprintf('%s.%0.8s', $basename, $extension);

            $image = file_get_contents($product['main_image']);
            $image_data = base64_encode($image);
            $encoded_image = "data:image/$extension;base64,$image_data";

            //store physical image file
            $filename = sprintf('%s.%0.8s', $basename, $extension);
            file_put_contents(__DIR__ . "/../../../public/images/" . $filename, $image);
            $url = "/images/" . $filename;
            
            $sql = "
                INSERT INTO
                    `product_images` (
                        `product_id`,
                        `url`,
                        `encoded_image`,
                        `main_image`
                    )
                VALUES (
                    :product_id,
                    :url,
                    :encoded_image,
                    1
                )
            ";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':product_id', $product['id']);
            $statement->bindParam(':url', $url);
            $statement->bindParam(':encoded_image', $encoded_image);
            $statement->execute();
        }
    }
}