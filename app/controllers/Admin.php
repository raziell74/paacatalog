<?php
namespace App\Controllers;
use App\Models\sectionsTable;

class Admin  extends controller {
    public function home(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $sections = new sectionsTable($this->container);
        $vars = [
            'name' => 'Peak Analysis & Automation Catalog',
            'sections' => $sections->getAll()
        ];
        return $this->view->render($response, "/admin.php", $vars);
    }

    public function post(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
       
    }

    public function deleteSection(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $sectionsTable = new sectionsTable($this->container);
        $section = $sectionsTable->get($args['id']);
        $section->delete();
        return $response->withRedirect('/');
    }

    public function updateSection(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        $sectionsTable = new sectionsTable($this->container);
        $section = $sectionsTable->get($args['id']);
        $data = $request->getParsedBody();
        foreach($data as $key => $value) {
            $section->set($key, $value);
        }
        $section->save();
        return $response->withRedirect('/#' . $section->cssId);
    }

    public function addSection(\Slim\Http\Request $request, \Slim\Http\Response $response, $args = []) {
        return $response->withRedirect('/');
    }
}