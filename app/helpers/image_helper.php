<?php
function encoded_img($image, $is_admin = true) {
    if(is_object($image)) {
        return $is_admin ? $image->url : $image->encoded_image;
    } else {
        if($is_admin) return $image;
        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $images_dir = strpos($image,"http") === false ? __DIR__ . "/../../public" : "";
        $image_file = file_get_contents($images_dir . $image);
        $mime_type = $file_info->buffer($image_file);
        $image_data = base64_encode($image_file);
        return "data:image/$mime_type;base64,$image_data";
    }
}