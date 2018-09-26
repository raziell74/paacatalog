<div id="<?=$product->cssId?>" class="col s12 m6 l4">
    <div class="card">
        <div class="card-image center">
            <div class="embeded-image <?=$product->main_image->cssId?>"></div>
            <?php if($view->isAdmin) { ?>
                <span class="card-title">
                    <a href="#<?=$section->cssId?>-product-list-anchor" class="btn-floating btn-large waves-effect waves-light blue product-edit" data-editor-id="#<?=$section->cssId?>-<?=$product->cssId?>-edit"><i class="material-icons">edit</i></a>
                    <button data-product="<?=$product->id?>"class="btn-floating btn-large waves-effect waves-light red product-delete"><i class="material-icons">delete</i></button>
                </span>
            <?php } ?>
        </div>
        <div class="card-action">
            <span class="card-title"><?=$product->name?></span>
            <a class="btn-large waves-effect waves-light blue darken-4 modal-trigger right" href="#<?=$product->cssId?>-modal" style="margin-top: -10px;">Check It Out</a>
            <?=$view->getPart('productModal', ['product' => $product])?>
        </div>
    </div>
</div>

<?=$view->getPart('productAdminModal', ['admin_only' => true, 'section' => $section, 'product' => $product])?>