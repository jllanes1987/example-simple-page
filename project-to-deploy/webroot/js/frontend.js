$( document ).ready(function() {

    $(".items-categories li a").click(function () {
        $(".items-categories li a").removeClass("selected");
       $.post('/example/frontend/index/' +$(this).attr('id'), function (data) {
          $("#content_view").html(data);
       });
    });

    $(".product-info .item_add a").click(function () {
        $.post('/example/frontend/updateCart.json', {'productId':$(this).attr('id')},function (data) {
            $('.header-top .shopping-cart span').text(data['cart'].total);
            $('.header-top .shopping-cart span.badge').text(data['cart'].num);
        });
    });
});

