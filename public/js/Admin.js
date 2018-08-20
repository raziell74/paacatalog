$(document).ready(function(){
    $('.section-edit').click(function(evnt){
        var sectionId = $(this).attr('data-section'),
            sectionPreview = $('#' + sectionId)
            sectionEditors = $('#' + sectionId + '-edit');
        sectionPreview.addClass('hide');
        sectionEditors.removeClass('hide');
    });

    $('.section-delete').click(function(evnt){
        var sectionId = $(this).attr('data-section');
        if(confirm("This will permanently delete this section and all products listed under this section. \n\n Are you sure you want to proceed?")) {
            window.location.href = "/delete/section/" + sectionId;
        }
    });

    $('.product-delete').click(function(evnt){
        var productId = $(this).attr('data-product');
        if(confirm("This will permanently delete this product. \n\n Are you sure you want to proceed?")) {
            window.location.href = "/delete/product/" + productId;
        }
    });

    $('.section-cancel-edit').click(function(evnt){
        var sectionId = $(this).attr('data-section'),
            sectionPreview = $('#' + sectionId)
            sectionEditors = $('#' + sectionId + '-edit');
        sectionPreview.removeClass('hide');
        sectionEditors.addClass('hide');
    });

    tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
        ],
        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });
});

$(window).load(function(){
    setTimeout(function(){
        $('.mce-widget.mce-notification.mce-notification-warning').remove();
    }, 500);
});