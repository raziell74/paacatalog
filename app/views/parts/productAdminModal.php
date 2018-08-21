<?php $savePath = $product->id == 0 ? '/add/product' : '/save/product/' . $product->id; ?>

<div id="<?=$section->cssId?>-<?=$product->cssId?>-modal-edit" class="modal">
    <div class="modal-content">
        <form action="<?=$savePath?>" method="post" enctype="multipart/form-data" id="<?=$product->cssId?>-edit">
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
                    <div class="row">
                        <div class="col s6">
                            <label for="<?=$product->cssId?>-main_image">Main Image</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input  id="<?=$product->cssId?>-main_image"
                                    name="main_image"
                                    type="file"
                                    class="dropify"
                                    data-max-file-size="16M"
                                    <?php if($product->main_image) { ?>
                                        data-default-file="<?=$product->main_image->url?>"
                                    <?php } ?>
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right right-align">
                            <label>Max File Size: 16 MB <br> Recommended Image Dimensions: 400 x 400</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>