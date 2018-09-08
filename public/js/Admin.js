$(document).ready(function(){
    //var toastHTML = '<span>A new version is available</span><a href="#" class="btn-flat toast-action">Update Now</a>';
    //toastInstance = M.toast({
    //    html: toastHTML,
    //    classes: 'green white-text pulse',
    //    displayLength: 60000
    //});
    
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

    $('.product-edit').click(function(evnt){
        var editorId = $(this).attr('data-editor-id');
        $(editorId).removeClass('hide');
        $(this).parents('.product-list').find('.card').addClass('hide');
    });

    $('.product-cancel-edit').click(function(evnt){
        var editorId = $(this).attr('data-editor-id');
        $(editorId).addClass('hide');
        $(this).parents('.product-list').find('.card').removeClass('hide');
    });

    $('.footer-edit').click(function(evnt){
        $('.footer-admin').removeClass('hide');
        $('#footer').addClass('hide');
    });

    $('.footer-cancel-edit').click(function(evnt){
        $('.footer-admin').addClass('hide');
        $('#footer').removeClass('hide');
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

    dropifyobj = $('.dropify').dropify();

    dropifyobj.on('dropify.beforeClear', function(event, obj){
        if(!$(obj.element).attr('data-default-file')) return true;

        var image_id = $(obj.element).attr('data-image-id');

        if(confirm("Do you really want to delete this image?")) {
            $.ajax({
                async: false,
                url: "/delete/product/image/" + image_id
            }).done(function() {
                M.toast({html: 'Image Deleted', classes: 'red darken-4 white-text'});
            });

            return true;
        }

        return false;
    });

    dropifyobj.on('dropify.afterClear', function(event, obj){
        var input = $(obj.element);
        if(input.hasClass('main-image')) return;
        input.parents('.add-image').remove();
    });

    $('.toggle-main-image').click(function(){
        var thisImage = $(this).parents('.add-image').find('input'),
            thisImageId = thisImage.attr('data-image-id'),
            mainImage = $(this).parents('.image-manager').find('input.main-image');

        $.ajax({
            url: "/product/set-main-image/" + thisImageId
        }).done(function() {
            var thisImageDefaultFile = thisImage.attr('data-default-file'),
            mainImageDefaultFile = mainImage.attr('data-default-file'),
            mainImageId = mainImage.attr('data-image-id');

            M.toast({html: 'Main Image Updated', classes: 'green darken-1 white-text'});
            thisImage.attr('data-default-file', mainImageDefaultFile);
            thisImage.attr('data-image-id', mainImageId);
            thisImage.data('dropify').destroy();

            mainImage.attr('data-default-file', thisImageDefaultFile);
            mainImage.attr('data-image-id', thisImageId);
            mainImage.data('dropify').destroy();

            var newImage = thisImage.clone(),
                newMainImage = mainImage.clone();

            thisImage.parent().prepend(newImage);
            thisImage.remove();
            mainImage.parent().prepend(newMainImage);
            mainImage.remove();

            newImage.dropify();
            newMainImage.dropify();
        });
    });

    $('.add-product-image').click(function(evnt){
        console.log('test');
        var container = $(this).parents('.additonal-images'),
            skeleton = container.find('.additonal-image-skeleton')
            newImage = skeleton.clone()
                               .removeClass('hide')
                               .removeClass('additonal-image-skeleton')
                               .addClass('add-image');
        console.log(container);
        newImage.insertBefore(skeleton);
        newImage.find('input').dropify();
    });
});

$(window).load(function(){
    setTimeout(function(){
        $('.mce-widget.mce-notification.mce-notification-warning').remove();
    }, 500);
});