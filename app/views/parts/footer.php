<footer class="page-footer orange">
    <div id="footer-anchor" class="container">
        <div id="footer" class="row">
            <div class="col l6 s12 white-text text-lighten-4">
                <?=$footer_text->text?>
            </div>
            <?php if($view->isAdmin) { ?>
                <a href="#footer-anchor" class="btn-floating btn-large waves-effect waves-light pulse blue footer-edit"><i class="material-icons">edit</i></a>
            <?php } ?>
        </div>

        <?=$view->getPart('footerAdmin', ['admin_only' => true, 'footer_text' => $footer_text]);?>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="blue-text text-lighten-3" href="http://www.catsimaginganddesign.com">Cat's Imaging & Design</a>
            Powered by <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
    </div>
</footer>