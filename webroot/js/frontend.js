"use strict";

$( document ).ready(function() {
    $('.items-categories li a').click(function () {

        var pathname = window.location.pathname;
        var pathSplited = pathname.toLowerCase().split('frontend');
        var categoryId = $(this).attr('id');
        if(!isIndex())
        {
            window.location.href = pathSplited[0]+'frontend/index/'+categoryId;
        }

        $('.content-view .loading').removeClass('hidden');
        $('.items-categories li a').removeClass('selected');
        $.get(baseUrl+'index/' +$(this).attr('id'), function (data) {
            $('#content_view').html(data);
            $('.content-view .loading').addClass('hidden');
            history.pushState({}, null, pathSplited[0]+'frontend/index/'+categoryId);
            bindProductEvents();
        });
    });

    $('.shopping-cart-list select').change(function () {
        var elementParent = $(this).parents('.panel-default');
        elementParent.find('.disable-item').removeClass('hidden');
        var productId = elementParent.attr('id');
        var productCount = this.value;

        $.post(baseUrl+'updateProductCart.json', {'productId':productId,'productCount':productCount},function (data) {
            elementParent.find('.total-price').text(data['price'].productTotal);
            elementParent.find('.disable-item').addClass('hidden');
            $('.header-top .shopping-cart .price').text(data['price'].total);
            $('.view-title form div#'+productId+' input[name*="quantity_"]').val(productCount);

        });
    });

    $('.shopping-cart-list .delete-product').click(function () {
        var elementParent = $(this).parents('.panel-default');
        elementParent.find('.disable-item').removeClass('hidden');
        var productId = $(this).attr('id');
        $.post(baseUrl+'deleteProductFromCart.json', {'productId':productId},function (data) {
            elementParent.find('.disable-item').addClass('hidden');
            elementParent.fadeOut(300,function(){
                elementParent.remove();
            });
            $('.header-top .shopping-cart span').text(data['cart'].total);
            $('.header-top .shopping-cart span.badge').text(data['cart'].num);
            $('.view-title form div#'+productId).remove();
            updatePaypalForm();
            toastr.success('The product was deleted.');
        });

    });

    bindProductEvents();
});

function bindProductEvents()
{
    $('.product-info .item_add a').click(function () {
        $.post(baseUrl+'updateCart.json', {'productId':$(this).attr('id')},function (data) {
            if(data['cart'].updated == true){
                $('.header-top .shopping-cart span').text(data['cart'].total);
                $('.header-top .shopping-cart span.badge').text(data['cart'].num);
                toastr.success('Product added to your cart!');
            }
            else{
                toastr.warning('This product is already on your cart!');
            }
        });
    });
}

function isIndex(){
    var pathname = window.location.pathname;
    var pathSplited = pathname.toLowerCase().split('/');
    for (var i = 0; i < pathSplited.length; i++) {
        if (pathSplited[i] == 'frontend' && pathSplited[i+1]!= 'index')
        {
            return false;
        }
    }
    return true;
}

function updatePaypalForm() {
    $('.view-title form div#form_items').children().each(function (index) {
        $(this).children('input[name*="item_number_"]').attr("name", "item_number_"+(index+1));
        $(this).children('input[name*="item_name_"]').attr("name", "item_name_"+(index+1));
        $(this).children('input[name*="amount_"]').attr("name", "amount_"+(index+1));
        $(this).children('input[name*="quantity_"]').attr("name", "quantity_"+(index+1));
    });
}

