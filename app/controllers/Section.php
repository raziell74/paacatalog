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
        $data = $this->processBackgroundImage($request, $data);
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

    private function processBackgroundImage(Request $request, $data) {
        $uploaded_files = $request->getUploadedFiles();
        $background_image_file = $uploaded_files['background_image'];

        if(empty($uploaded_files)) {
            $data['background_image'] = null;
        } else if ($background_image_file->getError() === UPLOAD_ERR_OK) {
            $filename = $this->moveUploadedFile($this->imagesDir, $background_image_file);
            $data['background_image'] = "/images/" . $filename;
        }
        return $data;
    }
}