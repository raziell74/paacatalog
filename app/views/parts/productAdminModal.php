<?php $savePath = $product->id == 0 ? '/add/product' : '/save/product/' . $product->id; ?>

<div id="<?=$section->cssId?>-<?=$product->cssId?>-modal-edit" class="modal">
    <div class="modal-content">
        <form action="<?=$savePath?>" method="post" id="<?=$product->cssId?>-edit">
            <input type="hidden" name="section_id" value="<?=$section->id?>">
            <div class="input-field col s6">
                <input placeholder="Product Name" id="<?=$section->cssId?>-<?=$product->cssId?>-name" name="name" type="text" class="validate" value="<?=$product->name?>">
                <label for="<?=$section->cssId?>-<?=$product->cssId?>-name">Product Name</label>
            </div>
            <div class="row right">
                <button type="submit" name="action" class="btn-large waves-effect waves-light blue section-save"><i class="material-icons right">send</i>Save</button>
                <a href="#!" class="modal-close btn-large waves-effect waves-light red section-cancel-edit"><i class="material-icons right">cancel</i>Cancel</a>
            </div>
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#<?=$section->cssId?>-<?=$product->cssId?>-overview-edit">Overview</a></li>
                    <li class="tab col s3"><a href="#<?=$section->cssId?>-<?=$product->cssId?>-specifications-edit">Specifications</a></li>
                    <li class="tab col s3"><a href="#<?=$section->cssId?>-<?=$product->cssId?>-technical-edit">Tech</a></li>
                    <li class="tab col s3"><a href="#<?=$section->cssId?>-<?=$product->cssId?>-images-edit">Images</a></li>
                </ul>
            </div>
            <div class="col s12 modal-tabs">
                <div id="<?=$section->cssId?>-<?=$product->cssId?>-overview-edit" class="col s12">
                    <div class="col s12 product-overview">
                        <label for="<?=$section->cssId?>-<?=$product->cssId?>-overview">Overview</label>
                        <textarea id="<?=$section->cssId?>-<?=$product->cssId?>-overview" name="overview"><?=$product->overview?></textarea>
                    </div>
                </div>
                <div id="<?=$section->cssId?>-<?=$product->cssId?>-specifications-edit" class="col s12">
                    <div class="col s12 product-specs">
                        <label for="<?=$section->cssId?>-<?=$product->cssId?>-specs">Specifications</label>
                        <textarea id="<?=$section->cssId?>-<?=$product->cssId?>-specs" name="specs"><?=$product->get('specs')?></textarea>
                    </div>
                </div>
                <div id="<?=$section->cssId?>-<?=$product->cssId?>-technical-edit" class="col s12">
                    <div class="col s12 product-tech">
                        <label for="<?=$section->cssId?>-<?=$product->cssId?>-tech">Tech</label>
                        <textarea id="<?=$section->cssId?>-<?=$product->cssId?>-tech" name="tech"><?=$product->tech?></textarea>
                    </div>
                </div>
                <div id="<?=$section->cssId?>-<?=$product->cssId?>-images-edit" class="col s12">
                    <?php if($product->main_image) { ?>
                        <div class="col s12 m6">
                            <img src="<?=$product->main_image->url?>" class="responsive-img">
                        </div>
                    <?php } ?>
                    <div class="input-field col s6">
                        <input placeholder="Main Image URL" id="<?=$section->cssId?>-<?=$product->cssId?>-main_image" name="main_image" type="text" class="validate" value="<?=$product->main_image->url?>">
                        <label for="<?=$section->cssId?>-<?=$section->cssId?>-main_image">Main Image URL</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>