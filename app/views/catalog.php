<?php require(__DIR__ . "/../helpers/image_helper.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Peak Analysis & Automation - Catalog</title>

    <?php if($is_admin) { ?>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700" rel="stylesheet">
        <link href="/css/dropify.min.css" rel="stylesheet">
    <?php } ?>
    <style type="text/css"><?php include(__DIR__ . "/css/materialize.min.css"); ?></style>
    <style type="text/css"><?php include(__DIR__ . "/css/Style" . ($is_admin ? '' : '.min') . ".css"); ?></style>
</head>
<body>
    <?php include(__DIR__ . "/parts/nav.php"); ?>

    <?php
        foreach($sections as $section) {
            include(__DIR__ . "/parts/section.php");
        }
    ?>

    <?php if($is_admin) include(__DIR__ . "/parts/sectionAddNew.php"); ?>

    <footer class="page-footer orange">
        <div class="container">
            <div class="row">
                <div class="col l6 s12 white-text text-lighten-4">
                    <h5>Company Bio</h5>
                    <p>We Design and build a range of precision laboratory robots for laboratory and manufacturing applications. The founders of the company have many years’ experience in factory automation and robotics prior to incorporating in 1989. The company started out (under the name of MEKAnize Inc.) as an integrator of motion control products and then expanded into manufacturing its own robots. Currently the robots are manufactured in-house for use in the biotechnology and clinical automation markets. Our range includes the BiNEDx, KiNEDx, SciNEDx and GX robots.</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="blue-text text-lighten-3" href="http://www.catsimaginganddesign.com">Cat's Imaging & Design</a>
                Powered by <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a>
            </div>
        </div>
    </footer>

    <script><?php include(__DIR__ . "/js/jquery-2.1.1.min.js"); ?></script>
    <script><?php include(__DIR__ . "/js/materialize.min.js"); ?></script>
    <script><?php include(__DIR__ . "/js/Initialize" . ($is_admin ? '' : '.min') . ".js"); ?></script>
    <?php if($is_admin) { ?>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script src='/js/dropify.min.js'></script>
        <script src='/js/Admin.js'></script>
    <?php } ?>
</body>
</html>
