$(document).ready(function(){
    $('.product-delete').click(function(evnt){
        var productId = $(this).attr('data-product');
        if(confirm("This will permanently delete this product. \n\n Are you sure you want to proceed?")) {
            window.location.href = "/delete/product/" + productId;
        }
    });

    $('.product-edit').click(function(evnt){
        var editorId = $(this).attr('data-editor-id');
        $(editorId).removeClass('hide');
        setTimeout(function(){
            $(editorId).removeClass('scale-out');
        }, 100);
        $(this).parents('.product-list').find('.card').addClass('hide');
    });

    $('.product-cancel-edit').click(function(evnt){
        var editorId = $(this).attr('data-editor-id'),
            cards = $(this).parents('.product-list').find('.card');
        $(editorId).addClass('scale-out');
        setTimeout(function(){
            $(editorId).addClass('hide');
            cards.removeClass('hide');
        }, 300);
    });
});