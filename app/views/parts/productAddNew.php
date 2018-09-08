<div id="<?=$product->cssId?>" class="col s12 m4">
    <div class="card">
        <div class="card-image center">
            <div class="valign-wrapper" style="height: 100%; width: 100%; position: absolute;">
                <div class="container">
                    <div class="row center">
                        <a class="btn-floating btn-large waves-effect waves-light pulse blue product-edit" data-editor-id="#<?=$section->cssId?>-<?=$product->cssId?>-edit"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
            <img src="https://www.paa-automation.com/wp-content/uploads/2015/08/KiNEDX-Wht-470-Mock-Shadow-2100x3500.jpg" style="opacity: 0">
            <span class="card-title">Add Product</span>
        </div>
        <div class="card-action">
            <a style="opacity:0;" class="btn-floating btn-large waves-effect waves-light pulse blue product-edit modal-trigger" href="#new-product-modal"><i class="material-icons">add</i></a>
        </div>
    </div>
</div>

<?=$view->getPart('productAdminModal', $view_vars)?>