<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Peak Analysis & Automation - Catalog</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style type="text/css">
        nav ul a, nav .brand-logo {color: white;}
        .card .card-image .card-title {color: darkgray;}
        h1.header.center, h5.header.col.s12.light {text-shadow: rgba(0, 0, 0, 0.75) 2px 2px 2px !important;}
        .modal-tabs {white-space: pre-line; height: 355px; overflow: auto;}
    </style>
</head>
<body>
    <div class="navbar-fixed">
        <nav id="nav_bar" class="blue darken-4" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo"><img style="width: 46%;" src="images/PAA_Logo_White@2x.png" alt="Unsplashed background img 1"></a>
                <ul class="right hide-on-med-and-down">
                    <?php foreach($sections as $section) { ?>
                        <li><a href="#<?=$section->cssId?>"><?=$section->name?></a></li>
                    <?php } ?>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <?php foreach($sections as $section) { ?>
                        <li><a href="#<?=$section->cssId?>"><?=$section->name?></a></li>
                    <?php } ?>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>

    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <h1 class="header center white-text text-lighten-2"><?=$name?></h1>
                <div class="row center">
                    <h5 class="header col s12 light">Supplying our own product range of robotic workcells, laboratory robots and scheduling software to automate a variety of applications.</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="images/overlord-slider.jpg"></div>
    </div>

    <?php foreach($sections as $section) { ?>
        <div id="<?=$section->cssId?>" class="parallax-container valign-wrapper orange-text">
            <div class="section no-pad-bot">
                <div class="container">
                    <h1 class="header center"><?=$section->name?></h1>
                    <?php if($section->get('short_desc')) { ?>
                        <div class="row center">
                            <h5 class="header col s12 light"><?=$section->short_desc?></h5>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="parallax"><img src="<?=$section->background_image?>" alt="Unsplashed background img 2"></div>
        </div>

        <?php if($section->get('description')) { ?>
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div id="contact" class="col s12 center">
                            <?=$section->description?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if($section->hasProducts()) { ?>
            <div class="container">
                <div class="section">
                    <div class="row">
                        <?php foreach($section->products as $product) { ?>
                            <div id="<?=$product->cssId?>" class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="images/Green-Bot.png">
                                        <span class="card-title"><?=$product->name?></span>
                                    </div>
                                    <div class="card-action">
                                        <a class="btn-large waves-effect waves-light blue darken-4 modal-trigger" href="#<?=$product->cssId?>-modal">Check It Out</a>

                                        <!-- Modal Structure -->
                                        <div id="<?=$product->cssId?>-modal" class="modal">
                                            <div class="modal-content">
                                                <h4><?=$product->name?></h4>
                                                <div class="col s12">
                                                    <ul class="tabs">
                                                        <li class="tab col s4"><a class="active" href="#<?=$product->cssId?>-overview">Overview</a></li>
                                                        <li class="tab col s4"><a href="#<?=$product->cssId?>-specifications">Specifications</a></li>
                                                        <li class="tab col s4"><a href="#<?=$product->cssId?>-technical">Tech</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col s12 m6">
                                                    <img src="images/Green-Bot.png" class="responsive-img">
                                                </div>
                                                <div class="tabs col s12 m6 modal-tabs">
                                                    <div id="<?=$product->cssId?>-overview" class="col s12">
                                                        <?=$product->overview?>
                                                    </div>
                                                    <div id="<?=$product->cssId?>-specifications" class="col s12">
                                                        <?=$product->specs?>
                                                    </div>
                                                    <div id="<?=$product->cssId?>-technical" class="col s12">
                                                        <?=$product->tech?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

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
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>
