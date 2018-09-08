<?php
namespace App\Helpers;

Class viewHelper {
    public $isAdmin;
    private $paths;

    public function __construct($is_admin = false) {
        $this->isAdmin = $is_admin;
        $viewsPath = __DIR__ . "/../views/";
        $this->paths = (object) [
            'css' => $viewsPath . "css/",
            'js' => $viewsPath . "js/",
            'parts' => $viewsPath . "parts/"
        ];
    }

    public function getPart
    (
        $part_name,
        $view_vars = [],
        $ext = 'php',
        $admin_only = false
    ) {
        $view = $this;
        extract($view_vars);
        if(!$admin_only || ($admin_only && $this->isAdmin)) {
            include($this->paths->parts . $part_name . '.' . $ext);
        }
    }

    public function getCSS($css_name, $force_min = false) {
        $minified = $force_min || !$this->isAdmin;
        $ext = $minified ? ".min.css" : ".css";
        return  '<style type="text/css">' .
                    file_get_contents($this->paths->css . $css_name . $ext) .
                '</style>';
    }

    public function getJS($js_name, $force_min = false) {
        $minified = $force_min || !$this->isAdmin;
        $ext = $minified ? ".min.js" : ".js";
        return  '<script>' .
                    file_get_contents($this->paths->js . $js_name . $ext) .
                '</script>';
    }

    public function embedImage($image) {
        if(is_object($image)) {
            return $this->isAdmin ? $image->url : $image->encoded_image;
        } else {
            if($this->isAdmin) return $image;
            $file_info = new \finfo(FILEINFO_MIME_TYPE);
            $images_dir = strpos($image,"http") === false ? __DIR__ . "/../../public" : "";
            $image_file = file_get_contents($images_dir . $image);
            $mime_type = $file_info->buffer($image_file);
            $image_data = base64_encode($image_file);
            return "data:image/$mime_type;base64,$image_data";
        }
    }
}