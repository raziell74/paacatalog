<?php
function img($url, $is_admin = true) {
    if($is_admin) return $url;
    $file_info = new finfo(FILEINFO_MIME_TYPE);
    $images_dir = strpos($url,"http") === false ? __DIR__ . "/../../public" : "";
    $image = file_get_contents($images_dir . $url);
    $mime_type = $file_info->buffer($image);
    $image_data = base64_encode($image);
    return "data:image/$mime_type;base64,$image_data";
}