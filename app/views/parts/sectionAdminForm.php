<?php $savePath = $section->id == 0 ? '/add/section' : '/save/section/' . $section->id; ?>
<form action="<?=$savePath?>" method="post" id="<?=$section->cssId?>-edit" class="z-depth-5 hide">
    <div class="parallax-container valign-wrapper orange-text">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <div class="input-field col s6">
                        <input placeholder="Section Name" id="<?=$section->cssId?>-name" name="name" type="text" class="validate" value="<?=$section->name?>">
                        <label for="<?=$section->cssId?>-name">Section Name</label>
                    </div>
                </div>

                <div class="row center">
                    <div class="input-field col s6">
                        <input placeholder="Short Description" id="<?=$section->cssId?>-short_desc" name="short_desc" type="text" class="validate" value="<?=$section->short_desc?>">
                        <label for="<?=$section->cssId?>-short_desc">Short Description</label>
                    </div>
                </div>

                <div class="row center">
                    <div class="input-field col s6">
                        <input placeholder="Background Image Url" id="<?=$section->cssId?>-background_image" name="background_image" type="text" class="validate" value="<?=$section->background_image?>">
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