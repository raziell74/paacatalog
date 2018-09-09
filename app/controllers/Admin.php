<?php
namespace App\Controllers;
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Models\sectionsTable;
use App\Models\footerTextTable;
use App\Helpers\viewHelper;

class Admin  extends controller {
    public function home(Request $request, Response $response) {
        $sections = new sectionsTable($this->container);
        $placeholders = $this->getPlaceholderObjects();
        $footer_text_table = new footerTextTable($this->container);
        $vars = [
            'view' => new viewHelper(true),
            'sections' => $sections->getAll(),
            'new_section' => $placeholders['section'],
            'new_product' => $placeholders['product'],
            'footer_text' => $footer_text_table->getFooterText()
        ];
        return $this->view->render($response, "/catalog.php", $vars);
    }

    public function download(Request $request, Response $response) {
        $sections = new sectionsTable($this->container);
        $vars = [
            'view' => new viewHelper(),
            'sections' => $sections->getAll(),
            'footer_text' => $footer_text
        ];
        $this->view->render($response, "/catalog.php", $vars);
        $downloadResponse = $response->withAddedHeader('Content-disposition', 'attachment; filename=PAA-Catalog.html');
        return $downloadResponse;
    }

    private function getPlaceholderObjects() {
        $empty_section = new \App\Models\section($this->container);
        $empty_section->set('id', 0)
                      ->set('cssId', "new-section")
                      ->set('name', "")
                      ->set('short_desc', "")
                      ->set('background_image', "")
                      ->set('description', "");
        $empty_product = new \App\Models\product($this->container);
        $empty_product->set('id', 0)
                      ->set('cssId', "new-product")
                      ->set('name', "")
                      ->set('overview', "")
                      ->set('specs', "")
                      ->set('tech', "")
                      ->set('main_image', "");
        return ['section' => $empty_section, 'product' => $empty_product];
    }
}