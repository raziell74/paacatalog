<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Peak Analysis & Automation - Catalog</title>

        <?=$view->getPart('adminCssLinks', ['admin_only' => true], 'html')?>

        <!-- Dynamic stylesheets (prints minified version if not in admin) -->
        <?=$view->getCSS('materialize', true)?>
        <?=$view->getCSS('Style')?>
    </head>
    <body>
        <!-- Top Navigation -->
        <?=$view->getPart('nav', ['sections' => $sections])?>

        <!-- Display each section -->
        <?php
            foreach($sections as $section) {
                $view->getPart('section',['section' => $section, 'new_product' => $new_product]);
            }
        ?>

        <!-- Display add new section -->
        <?=$view->getPart('sectionAddNew',['admin_only' => true, 'new_section' => $new_section])?>

        <!-- Shows footer -->
        <?=$view->getPart('footer', ['footer_text' => $footer_text])?>

        <!-- Dynamic javascript (prints minified version if not in admin) -->
        <?=$view->getJS('jquery-2.1.1', true)?>
        <?=$view->getJS('materialize', true)?>
        <?=$view->getJS('Initialize')?>

        <?=$view->getPart('adminJavaScriptLinks', ['admin_only' => true], 'html')?>
    </body>
</html>
