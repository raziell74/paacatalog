<div id="footer-anchor" class="container">
    <div id="footer" class="row">
        <div class="col l6 s12 white-text text-lighten-4">
            <h5>Company Bio</h5>
            <p>We Design and build a range of precision laboratory robots for laboratory and manufacturing applications. The founders of the company have many years’ experience in factory automation and robotics prior to incorporating in 1989. The company started out (under the name of MEKAnize Inc.) as an integrator of motion control products and then expanded into manufacturing its own robots. Currently the robots are manufactured in-house for use in the biotechnology and clinical automation markets. Our range includes the BiNEDx, KiNEDx, SciNEDx and GX robots.</p>
        </div>
        <?php if($is_admin) { ?>
            <a href="#footer-anchor" class="btn-floating btn-large waves-effect waves-light pulse blue footer-edit"><i class="material-icons">edit</i></a>
        <?php } ?>
    </div>

    <?php if($is_admin) include(__DIR__ . "/footerAdmin.php"); ?>
</div>
<div class="footer-copyright">
    <div class="container">
        Made by <a class="blue-text text-lighten-3" href="http://www.catsimaginganddesign.com">Cat's Imaging & Design</a>
        Powered by <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a>
    </div>
</div>