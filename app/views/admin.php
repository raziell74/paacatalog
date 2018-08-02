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
                <h1 class="header center white-text text-lighten-2">Peak Analysis & Automation Catalog</h1>
            </div>
        </div>
        <div class="parallax"><img src="images/overlord-slider.jpg"></div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row center">
                <h5 class="header col s12">Supplying our own product range of robotic workcells, laboratory robots and scheduling software to automate a variety of applications.</h5>
            </div>
        </div>
    </div>

    <?php foreach($sections as $section) { ?>
        <div class="section-content">
            <div id="<?=$section->cssId?>" class="preview-display">
                <div class="parallax-container valign-wrapper orange-text">
                    <div class="section no-pad-bot">
                        <div class="right crud-buttons">
                            <button data-section="<?=$section->cssId?>" class="btn-floating btn-large waves-effect waves-light pulse blue section-edit"><i class="material-icons">edit</i></button>
                            <button data-section="<?=$section->id?>"class="btn-floating btn-large waves-effect waves-light pulse red section-delete"><i class="material-icons">delete</i></button>
                        </div>
                        <div class="container">
                            <h1 class="header center section-name"><?=$section->name?></h1>

                            <div class="row center">
                                <h5 class="header col s12 light section-short-desc"><?=$section->short_desc?></h5>
                            </div>
                        </div>
                    </div>
                    <?php if($section->background_image) { ?>
                        <div class="parallax"><img class="section-background-image" src="<?=$section->background_image?>" alt="Unsplashed background img 2"></div>
                    <?php } ?>
                </div>

                <div class="container">
                    <div class="section">
                        <div class="row">
                            <div class="col s12 center section-description">
                                <?=$section->description?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="/save/section/<?=$section->id?>" method="post" id="<?=$section->cssId?>-edit" class="z-depth-5 hide">
                <div class="parallax-container valign-wrapper orange-text">
                    <div class="section no-pad-bot">
                        <div class="container">
                            <div class="row center">
                                <div class="input-field col s6">
                                    <input placeholder="Placeholder" id="<?=$section->cssId?>-name" name="name" type="text" class="validate" value="<?=$section->name?>">
                                    <label for="<?=$section->cssId?>-name">Section Name</label>
                                </div>
                            </div>

                            <div class="row center">
                                <div class="input-field col s6">
                                    <input placeholder="Placeholder" id="<?=$section->cssId?>-short_desc" name="short_desc" type="text" class="validate" value="<?=$section->short_desc?>">
                                    <label for="<?=$section->cssId?>-short_desc">Short Description</label>
                                </div>
                            </div>

                            <div class="row center">
                                <div class="input-field col s6">
                                    <input placeholder="Placeholder" id="<?=$section->cssId?>-background_image" name="background_image" type="text" class="validate" value="<?=$section->background_image?>">
                                    <label for="<?=$section->cssId?>-background_image">Header Background Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="section">
                        <div class="row">
                            <div class="input-field col s12 section-description">
                                <textarea id="<?=$section->cssId?>-description" name="description"><?=$section->description?></textarea>
                                <label for="<?=$section->cssId?>-description" style="top: -45px;">Section Description</label>
                            </div>
                        </div>
                        <div class="row center">
                            <button type="submit" name="action" class="btn-large waves-effect waves-light blue section-save"><i class="material-icons right">send</i>Save</button>
                            <a data-section="<?=$section->cssId?>" class="btn-large waves-effect waves-light red section-cancel-edit"><i class="material-icons right">cancel</i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
                                                <div class="col s12 m6 modal-tabs">
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

    <div class="section-content">
        <div id="new-section" class="preview-display new">
            <div class="parallax-container valign-wrapper orange-text z-depth-5">
                <div class="section no-pad-bot">
                    <div class="container">
                        <div class="center crud-buttons">
                            <h1 class="header center section-name">Add New Section <button data-section="new-section" class="btn-floating btn-large waves-effect waves-light pulse blue section-edit"><i class="material-icons right">add</i></button></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="/add/section" method="post" id="new-section-edit" class="z-depth-5 hide">
            <div class="parallax-container valign-wrapper orange-text">
                <div class="section no-pad-bot">
                    <div class="container">
                        <div class="row center">
                            <div class="input-field col s6">
                                <input placeholder="Placeholder" id=new-section-name" name="name" type="text" class="validate" require>
                                <label for="new-section-name">Section Name</label>
                            </div>
                        </div>

                        <div class="row center">
                            <div class="input-field col s6">
                                <input placeholder="Placeholder" id="new-section-short_desc" name="short_desc" type="text" class="validate">
                                <label for="new-section-short_desc">Short Description</label>
                            </div>
                        </div>

                        <div class="row center">
                            <div class="input-field col s6">
                                <input placeholder="Placeholder" id="new-section-background_image" name="background_image" type="text" class="validate">
                                <label for="new-section-background_image">Header Background Image</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="input-field col s12 section-description">
                            <textarea id="new-section-description" name="description"></textarea>
                            <label for="new-section-description" style="top: -45px;">Section Description</label>
                        </div>
                    </div>
                    <div class="row center">
                        <button type="submit" name="action" class="btn-large waves-effect waves-light blue section-save"><i class="material-icons right">send</i>Save</button>
                        <a data-section="new-section" class="btn-large waves-effect waves-light red section-cancel-edit"><i class="material-icons right">cancel</i>Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

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
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script src="js/init.js"></script>
</body>
</html>