<?php
namespace App\Models;

class footerTextTable extends Model {
    public function getFooterText() {
        $statement = $this->db->prepare("SELECT * FROM footer_text WHERE id = 1");
        $statement->execute();
        $footer_text = $this->fetchAsFooterTextObjs($statement->fetchAll());
        return $footer_text[0] ?? null;
    }

    private function fetchAsFooterTextObjs($raw_footer_texts) {
        $footer_texts = [];
        foreach($raw_footer_texts as $footer_text_data) {
            $footer_texts[] = new footerText($this->container, $footer_text_data);
        }

        return $footer_texts;
    }
}