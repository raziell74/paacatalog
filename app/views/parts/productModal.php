<div id="<?=$product->cssId?>-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4><?=$product->name?></h4>
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col l4 s3"><a href="#<?=$product->cssId?>-overview">Overview</a></li>
                <li class="tab col l4 s3"><a href="#<?=$product->cssId?>-specifications">Specifications</a></li>
                <li class="tab col l4 s3"><a href="#<?=$product->cssId?>-technical">Tech</a></li>
                <li class="tab col s3 hide-on-large"><a href="#<?=$product->cssId?>-images">images</a></li>
            </ul>
        </div>
        <!--<div class="col s12 m6">
            <img src="<?=$view->embedImage($product->main_image); ?>" class="responsive-img">
        </div>-->
        <div class="col s12">
            <div class="left hide-on-med-and-down image-slide-show">
                <div class="modal-tabs">
                    <?php foreach($product->images as $image) { ?>
                        <div id="<?=$image->cssId?>-medium" class="center">
                            <img src="<?=$view->embedImage($image); ?>">
                        </div>
                    <?php } ?>
                </div>
                <ul class="tabs">
                    <?php foreach($product->images as $image) { ?>
                        <li class="tab col s3">
                            <a href="#<?=$image->cssId?>-medium">
                                <img src="<?=$view->embedImage($image); ?>" class="responsive-img thumbnail">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            
            <div class="modal-tabs">
                <div id="<?=$product->cssId?>-overview" class="browser-default">
                    <?=$product->overview?>
                </div>
                <div id="<?=$product->cssId?>-specifications" class="browser-default">
                    <?=$product->get('specs')?>
                </div>
                <div id="<?=$product->cssId?>-technical" class="browser-default">
                    <?=$product->tech?>
                </div>
                <div id="<?=$product->cssId?>-images">
                    <div class="left image-slide-show hide-on-large-only col s12">
                        <div class="modal-tabs">
                            <?php foreach($product->images as $image) { ?>
                                <div id="<?=$image->cssId?>-mobile" class="center">
                                    <img src="<?=$view->embedImage($image); ?>">
                                </div>
                            <?php } ?>
                        </div>
                        <ul class="tabs">
                            <?php foreach($product->images as $image) { ?>
                                <li class="tab col s3">
                                    <a href="#<?=$image->cssId?>-mobile">
                                        <img src="<?=$view->embedImage($image); ?>" class="responsive-img thumbnail">
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green red ligten-4 btn-small">Close</a>
    </div>
</div>