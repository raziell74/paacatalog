<style type="text/css"><?php
    foreach($sections as $section) {
        foreach($section->products as $product) {
            foreach($product->images as $image) {
                ?>.<?=$image->cssId?> {background-image: url(" <?=$view->embedImage($image)?>");} <?php
            }
        }
    }
?>.default-image {background-image: url(" <?=$view->embedImage($product->default_image)?>");}</style>