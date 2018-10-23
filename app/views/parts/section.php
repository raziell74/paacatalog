<div class="section-content" data-section-id="<?=$section->id?>">
    <div id="<?=$section->cssId?>" class="preview-display">
        <div class="parallax-container valign-wrapper orange-text">
            <div class="section no-pad-bot">
                <?php if($view->isAdmin) { ?>
                    <div class="right crud-buttons">
                        <button data-section="<?=$section->cssId?>" class="btn-floating btn-large waves-effect waves-light blue section-edit"><i class="material-icons">edit</i></button>
                        <button data-section="<?=$section->id?>"class="btn-floating btn-large waves-effect waves-light red section-delete"><i class="material-icons">delete</i></button>
                    </div>

                    <a class="section-sort-button sort-up">
                      <i class="medium material-icons">expand_less</i>
                    </a>
                    <a class="section-sort-button sort-down">
                      <i class="medium material-icons">expand_more</i>
                    </a>
                <?php } ?>
                <div class="container">
                    <button class="btn-floating btn-large waves-effect waves-light blue dark-4 section-collapse-button" data-css-id="<?=$section->cssId?>">
                        <i class="material-icons">remove</i>
                    </button>

                    <h1 class="header center section-name"><?=$section->name?></h1>
                    <?php if($section->short_desc) { ?>
                        <div class="row center">
                            <h5 class="header col s12 light section-short-desc"><?=$section->short_desc?></h5>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if($section->background_image) { ?>
                <div class="parallax"><img class="section-background-image" src="<?=$view->embedImage($section->background_image)?>" alt="Unsplashed background img 2"></div>
            <?php } ?>
        </div>

        <div id="<?=$section->cssId?>-product-list-anchor" class="container section-collapsable section-collapse-<?=$section->cssId?>">
            <div class="section">
                <div class="row">
                    <div class="col s12 center section-description">
                        <?=$section->description?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?=$view->getPart('sectionAdminForm', ['admin_only' => true, 'section' => $section])?>
</div>

<div class="container section-collapsable section-collapse-<?=$section->cssId?>"">
    <div class="section">
        <div class="row product-list">
            <div>
              <?php foreach($section->products as $product) {
                  $view->getPart('product', ['section' => $section, 'product' => $product]);
              } ?>
            </div>
            <?php if($view->isAdmin) $new_product->set('sort_order', count($section->products)); ?>
            <?=$view->getPart('productAddNew', ['admin_only' => true, 'section' => $section, 'product' => $new_product])?>
        </div>
    </div>
</div>