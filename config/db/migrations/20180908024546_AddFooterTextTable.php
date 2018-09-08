<?php

use Phpmig\Migration\Migration;

class AddFooterTextTable extends Migration {
    public function init() {
        parent::init();
        $container = $this->getContainer();
        $this->db = $container['db'];
    }

    public function up() {
        $sql = "CREATE TABLE `footer_text` (
                                `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                `text` TEXT NULL DEFAULT NULL,
                                PRIMARY KEY (`id`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $this->db->query($sql);

        $sql = "
            INSERT INTO
                footer_text (text)
            VALUES (
                '<h5>Company Bio</h5>
                 <p>
                 We Design and build a range of precision laboratory robots
                 for laboratory and manufacturing applications. The founders of
                 the company have many years’ experience in factory automation
                 and robotics prior to incorporating in 1989. The company
                 started out (under the name of MEKAnize Inc.) as an integrator
                 of motion control products and then expanded into manufacturing
                 its own robots. Currently the robots are manufactured in-house
                 for use in the biotechnology and clinical automation markets.
                 Our range includes the BiNEDx, KiNEDx, SciNEDx and GX robots.
                 </p>'
            )";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "DROP TABLE `footer_text`";
        $this->db->query($sql);
    }
}