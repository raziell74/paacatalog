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
        <?php include(__DIR__ . "/parts/footer.php"); ?>
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
