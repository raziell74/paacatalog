<?php
    $product = new  App\Models\section();
    $section->set('cssId', "new-section");
    $section->set('name', "");
    $section->set('short_desc', "");
    $section->set('background_image', "");
    $section->set('description', "");
?>

<div class="section-content">
    <div id="new-section" class="preview-display new">
        <div class="parallax-container valign-wrapper orange-text z-depth-5">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="center crud-buttons">
                        <h1 class="header center section-name">Add New Section <button data-section="<?=$section->cssId?>" class="btn-floating btn-large waves-effect waves-light pulse blue section-edit"><i class="material-icons right">add</i></button></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include(__DIR__ . "/sectionAdminForm.php"); ?>
</div>