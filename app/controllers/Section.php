<?php
namespace App\Controllers;
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Models\sectionsTable;

class Section  extends controller {
    public function addSection(Request $request, Response $response) {
        $sectionsTable = new sectionsTable($this->container);
        $data = $request->getParsedBody();
        $sectionsTable->addSection($data);
        return $response->withRedirect('/#' . $section->cssId);
    }

    public function updateSection(Request $request, Response $response, $args) {
        $sectionsTable = new sectionsTable($this->container);
        $section = $sectionsTable->get($args['id']);
        $data = $request->getParsedBody();
        foreach($data as $key => $value) {
            $section->set($key, $value);
        }
        $section->update();
        return $response->withRedirect('/#' . $section->cssId);
    }

    public function deleteSection(Request $request, Response $response, $args) {
        $sectionsTable = new sectionsTable($this->container);
        $section = $sectionsTable->get($args['id']);
        $section->delete();
        return $response->withRedirect('/');
    }
}