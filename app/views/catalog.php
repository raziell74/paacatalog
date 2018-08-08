<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Peak Analysis & Automation - Catalog</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style type="text/css"><?php include(__DIR__ . "/css/Style" . ($is_admin ? '' : '.min') . ".css"); ?></style>
</head>
<body>
    <?php include(__DIR__ . "/parts/nav.php"); ?>

    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <h1 class="header center white-text text-lighten-2">Peak Analysis & Automation Catalog</h1>
            </div>
        </div>
        <div class="parallax"><img src="https://www.paa-automation.com/wp-content/uploads/2015/11/overlord-slider.jpg"></div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row center">
                <h5 class="header col s12">Supplying our own product range of robotic workcells, laboratory robots and scheduling software to automate a variety of applications.</h5>
            </div>
        </div>
    </div>

    <?php
        foreach($sections as $section) {
            include(__DIR__ . "/parts/section.php");
        }
    ?>

    <?php if($is_admin) include(__DIR__ . "/parts/sectionAddNew.php"); ?>

    <footer class="page-footer orange">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">Company Description Here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. </p>
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

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script><?php include(__DIR__ . "/js/Initialize" . ($is_admin ? '' : '.min') . ".js"); ?></script>
    <?php if($is_admin) { ?>
        <script><?php include(__DIR__ . "/js/Admin.js"); ?></script>
    <?php } ?>
</body>
</html>
