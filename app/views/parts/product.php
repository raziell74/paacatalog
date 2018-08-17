<div id="<?=$product->cssId?>" class="col s12 m4">
    <div class="card">
        <div class="card-image center">
            <img width="365" height="365" src="<?=img($product->main_image ?: $product->default_image, $is_admin)?>">
            <span class="card-title"><?=$product->name?></span>
        </div>
        <div class="card-action">
            <a class="btn-large waves-effect waves-light blue darken-4 modal-trigger" href="#<?=$product->cssId?>-modal">Check It Out</a>
            <?php if($is_admin) { ?>
                <a class="btn-floating btn-large waves-effect waves-light pulse blue product-edit modal-trigger" href="#<?=$section->cssId?>-<?=$product->cssId?>-modal-edit"><i class="material-icons">edit</i></a>
                <button data-product="<?=$product->id?>"class="btn-floating btn-large waves-effect waves-light pulse red product-delete"><i class="material-icons">delete</i></button>
            <?php } ?>

            <?php include(__DIR__ . "/productModal.php"); ?>
            <?php if($is_admin) include(__DIR__ . "/productAdminModal.php"); ?>
        </div>
    </div>
</div>