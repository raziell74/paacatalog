$(document).ready(function(){
    dropifyobj = $('.dropify').dropify();

    $('.add-product-image').click(function(evnt){
        var container = $(this).parents('.additonal-images'),
            skeleton = container.find('.additonal-image-skeleton')
            newImage = skeleton.clone()
                               .removeClass('hide')
                               .removeClass('additonal-image-skeleton')
                               .addClass('add-image');
        newImage.insertBefore(skeleton);
        newImage.find('input').dropify();
    });
    
    handleImageDeletion(dropifyobj);
    handleMainImageToggling();
});

function handleImageDeletion(dropifyobj){
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
}

function handleMainImageToggling() {
    $('.toggle-main-image').click(function(){
        var thisImage = $(this).parents('.add-image').find('input'),
            thisImageId = thisImage.attr('data-image-id'),
            mainImage = $(this).parents('.image-manager').find('input.main-image');

        $.ajax({
            url: "/product/set-main-image/" + thisImageId
        }).done(function() {
            M.toast({html: 'Main Image Updated', classes: 'green darken-1 white-text'});

            var thisImageDefaultFile = thisImage.attr('data-default-file'),
            mainImageDefaultFile = mainImage.attr('data-default-file'),
            mainImageId = mainImage.attr('data-image-id');

            //exchange image data information
            thisImage.attr('data-default-file', mainImageDefaultFile);
            thisImage.attr('data-image-id', mainImageId);
            thisImage.data('dropify').destroy();
            mainImage.attr('data-default-file', thisImageDefaultFile);
            mainImage.attr('data-image-id', thisImageId);
            mainImage.data('dropify').destroy();

            //the original inputs must remain immutable for dropify to update
            var newImage = thisImage.clone(),
                newMainImage = mainImage.clone();

            //add new inputs to respective parents and destroy immutable input fields
            thisImage.parent().prepend(newImage);
            thisImage.remove();
            mainImage.parent().prepend(newMainImage);
            mainImage.remove();

            //apply dropify to updated input fields
            newImage.dropify();
            newMainImage.dropify();
        });
    });
}