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
        }, 500);
    });

    $('.product-sort-button.sort-right').click(function(evnt){
        var product_card = $(this).parents('.product-card'),
            product_edit = product_card.next(),
            next_product = product_edit.next();

        product_card.addClass('scale-out');
        next_product.addClass('scale-out');

        setTimeout(function(){
            product_card.insertAfter(product_edit);
            next_product.insertBefore(product_edit);
            setTimeout(function(){
              product_card.removeClass('scale-out');
              next_product.removeClass('scale-out');
            }, 100);
        }, 500);
    });

    $('.product-sort-button.sort-left').click(function(evnt){
        var product_card = $(this).parents('.product-card'),
            product_edit = product_card.prev(),
            previous_product = product_edit.prev();

        product_card.addClass('scale-out');
        previous_product.addClass('scale-out');

        setTimeout(function(){
            product_card.insertBefore(product_edit);
            previous_product.insertAfter(product_edit);
            setTimeout(function(){
              product_card.removeClass('scale-out');
              previous_product.removeClass('scale-out');
            }, 100);
        }, 400);
    });
});