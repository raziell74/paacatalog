<?php
namespace App\Controllers;
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Models\footerTextTable;

class FooterText  extends controller {
    public function update(Request $request, Response $response, $args) {
        $footerTextTable = new sectionsTable($this->container);
        $footerText = $footerTextTable->getFooterText();
        $data = $request->getParsedBody();
        $footerText->set('text', $data['text'])->update();
        return $response->withRedirect('/#footer-anchor');
    }
}