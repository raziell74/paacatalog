<div class="row footer-admin hide">
    <form action="/save/footer" method="post" class="col s6">
        <textarea name="text" id="footer-text"><?=$footer_text->text?></textarea>
        <br>
        <div class="right">
            <button type="submit" name="action" class="btn-large waves-effect waves-light blue section-save"><i class="material-icons right">send</i>Save</button>
            <a class="btn-large waves-effect waves-light red footer-cancel-edit"><i class="material-icons right">cancel</i>Cancel</a>
        </div>
    </form>
</div>