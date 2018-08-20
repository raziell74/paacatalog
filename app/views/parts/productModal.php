<div id="<?=$product->cssId?>-modal" class="modal s12">
    <div class="modal-content">
        <h4><?=$product->name?></h4>
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s4"><a href="#<?=$product->cssId?>-overview">Overview</a></li>
                <li class="tab col s4"><a href="#<?=$product->cssId?>-specifications">Specifications</a></li>
                <li class="tab col s4"><a href="#<?=$product->cssId?>-technical">Tech</a></li>
            </ul>
        </div>
        <div class="col s12 m6">
            <img src="<?=encoded_img($product->main_image, $is_admin); ?>" class="responsive-img">
        </div>
        <div class="col s12 m6 modal-tabs">
            <div id="<?=$product->cssId?>-overview" class="col s12">
                <?=$product->overview?>
            </div>
            <div id="<?=$product->cssId?>-specifications" class="col s12">
                <?=$product->get('specs')?>
            </div>
            <div id="<?=$product->cssId?>-technical" class="col s12">
                <?=$product->tech?>
            </div>
        </div>
    </div>
</div>