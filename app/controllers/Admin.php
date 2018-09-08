<?php
namespace App\Controllers;
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Models\sectionsTable;
use App\Models\footerTextTable;

class Admin  extends controller {
    public function home(Request $request, Response $response) {
        $sections = new sectionsTable($this->container);
        $new_section = new \App\Models\section($this->container);
        $new_section->set('id', 0)
                    ->set('cssId', "new-section")
                    ->set('name', "")
                    ->set('short_desc', "")
                    ->set('background_image', "")
                    ->set('description', "");
        $new_product = new \App\Models\product($this->container);
        $new_product->set('id', 0)
                    ->set('cssId', "new-product")
                    ->set('name', "")
                    ->set('overview', "")
                    ->set('specs', "")
                    ->set('tech', "")
                    ->set('main_image', "");
        $footer_text_table = new footerTextTable($this->container);
        $footer_text = $footer_text_table->getFooterText();
        $vars = [
            'is_admin' => true,
            'sections' => $sections->getAll(),
            'new_section' => $new_section,
            'new_product' => $new_product,
            'footer_text' => $footer_text
        ];
        return $this->view->render($response, "/catalog.php", $vars);
    }

    public function download(Request $request, Response $response) {
        $sections = new sectionsTable($this->container);
        $vars = [
            'is_admin' => false,
            'sections' => $sections->getAll()
        ];
        $view = $this->view->render($response, "/catalog.php", $vars);
        $downloadResponse = $response->withAddedHeader('Content-disposition', 'attachment; filename=PAA-Catalog.html');
        return $downloadResponse;
    }
}