<?php $savePath = $product->id == 0 ? '/add/product' : '/save/product/' . $product->id; ?>

<div id="<?=$section->cssId?>-<?=$product->cssId?>-edit" class="z-depth-5 clearfix scale-transition scale-out hide">
    <div class="container">
        <div class="row">
            <div class="col s12"><br></div>
            <div class="col s12">
                <form action="<?=$savePath?>" method="post" enctype="multipart/form-data" id="<?=$product->cssId?>-edit">
                    <input type="hidden" name="section_id" value="<?=$section->id?>">
                    <div class="input-field col s6">
                        <input placeholder="Product Name" id="<?=$section->cssId?>-<?=$product->cssId?>-name" name="name" type="text" class="validate" value="<?=$product->name?>">
                        <label for="<?=$section->cssId?>-<?=$product->cssId?>-name">Product Name</label>
                    </div>
                    <div class="row right">
                        <button type="submit" name="action" class="btn-large waves-effect waves-light blue section-save"><i class="material-icons right">send</i>Save</button>
                        <a data-editor-id="#<?=$section->cssId?>-<?=$product->cssId?>-edit" class="btn-large waves-effect waves-light red product-cancel-edit"><i class="material-icons right">cancel</i>Cancel</a>
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
                        <div id="<?=$section->cssId?>-<?=$product->cssId?>-images-edit" class="col s12 image-manager">
                            <div class="row">
                                <div class="col s6">
                                    <label for="<?=$product->cssId?>-main_image">Main Image</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <input  name="images[]"
                                            type="file"
                                            class="dropify main-image"
                                            data-max-file-size="16M"
                                            <?php if($product->main_image) { ?>
                                                data-default-file="<?=$product->main_image->url?>"
                                            <?php } ?>
                                            data-image-id="<?=$product->main_image->id?>"

                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label>Additional Images</label>
                                </div>
                            </div>
                            <div class="row additonal-images">
                                <?php foreach($product->images as $image) { ?>
                                    <?php if($image->id == $product->main_image->id) continue; ?>
                                    <div class="col s3 add-image" style="margin-bottom: 20px; position: relative;">
                                        <input  name="images[]"
                                                type="file"
                                                class="dropify"
                                                data-default-file="<?=$image->url?>"
                                                data-max-file-size="16M"
                                                data-image-id="<?=$image->id?>"
                                        />
                                        <div class="center" style="width:100%; position:absolute; bottom: -10px; padding-right: 20px; z-index: 900;">
                                            <a class="btn-small waves-effect waves-light blue toggle-main-image">Make Main Image</a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col s3 hide additonal-image-skeleton" style="margin-bottom: 20px;">
                                    <input  name="images[]"
                                            type="file"
                                            data-max-file-size="16M"
                                    />
                                </div>
                                <div class="col s3">
                                    <div class="valign-wrapper" style="height: 200px; border: 2px solid #e0e0e0; padding: 5px 10px;">
                                        <div class="center col s12">
                                            <a class="btn-floating btn-large waves-effect waves-light pulse blue add-product-image"><i class="material-icons">add</i></a>
                                            <div>
                                                <label>Add Image</label>
                                            </div>
                                        </div>
                                    </div>
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
            <div class="col s12"><br></div>
        </div>
    </div>
</div>