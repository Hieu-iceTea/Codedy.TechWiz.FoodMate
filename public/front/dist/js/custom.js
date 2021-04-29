// Tùy biến JS

$(document).ready(function () {
    $('.cart-summary').show();
    $('.notification').show();

    // ẩn icon cài đặt giao diện
    $('#style-switcher-toggle').css('display', 'none');
    $('#style-switcher').css('display', 'none');
});


function addCart(productId) {
    $.ajax({
        type: "GET",
        url: "../cart/add/" + productId,
        data: {},
        success: function (response) {
            // - Cách 1: Tải lại trang:
            //location.reload();


            // - Cách 2: Không tải lại trang:
            // [01] - - Xử lý thay đổi số giỏ hàng, tổng tiền : - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            $('.module-cart .notification').text(response['count']); //tổng số cart ở icon giỏ hàng
            $('.module-cart .value-show').text(response['total']); //tổng tiền ở icon giỏ hàng

            $('#panel-cart .cart-products-total-show').text(response['total']); //tổng tiền ở menu bên trái trong giỏ hàng
            $('#panel-cart .cart-total-show').text(response['total']); //tổng tiền ở menu bên trái trong giỏ hàng


            $('#addCart .product-modal-name').text(response['cart'].name); //tổng tiền ở menu bên trái trong giỏ hàng
            $('#addCart .product-modal-qty-price').text(response['cart'].qty + ' item x $' + response['cart'].price); //tổng tiền ở menu bên trái trong giỏ hàng
            $('#addCart .product-modal-price').text(response['cart'].price * response['cart'].qty); //tổng tiền ở menu bên trái trong giỏ hàng



            // [02] - - Xử lý item trong giỏ hàng (ở đây là mỗi thẻ <tr> trong bảng <table>): - - - - - - - - - - - - - - -
            //thẻ <tr> mới chứa item mới của cart mới thêm:
            var new_item_tr_cartTable = '' +
                '<tr data-product_id="' + response['cart'].id + '">\n' +
                '    <td class="title">\n' +
                '        <span class="name">\n' +
                '            <a href="../#product-modal-hide" data-toggle="modal">' + response['cart'].name + '</a></span>\n' +
                '        <span class="caption text-muted">' + response['cart'].qty + ' item x $' + response['cart'].price + '</span>\n' +
                '    </td>\n' +
                '    <td class="price">$' + response['cart'].price * response['cart'].qty + '</td>\n' +
                '    <td class="actions">\n' +
                '        <button class="close border-0 bg-transparent"\n' +
                '                onclick="confirm(\'Delete this item?\') === true ? window.location=\'../cart/delete/' + response['cart'].rowId + '\' : \'\'">\n' +
                '            <i class="ti ti-close"></i>\n' +
                '        </button>\n' +
                '    </td>\n' +
                '</tr>'

            var cartTable = $('#panel-cart .cart-table-show'); //truy vấn bảng cart
            var exist_item_tr_cartTable = cartTable.find("tr" + "[data-product_id='" + response['cart'].id + "']"); //truy vấn và tìm xem đã có <tr> của sản phẩm mới thêm chưa

            //Nếu có thì thay đổi <tr> đó bằng <tr> mới. Nếu chưa có thì thêm <tr> mới vào bảng
            if (exist_item_tr_cartTable.length) {
                exist_item_tr_cartTable.replaceWith(new_item_tr_cartTable);
            } else {
                cartTable.append(new_item_tr_cartTable);
            }

            // [03] - - Hiển thị bảng cart & ẩn phần hiển thị "cart-empty" - - - - - - - - - - - - - - - - - - - - - - - -
            cartTable.removeClass('d-none');
            $('#panel-cart .cart-summary').removeClass('d-none');
            $('#panel-cart .cart-empty').addClass('d-none');

            //alert('Add successful!\nProduct: ' + response['cart'].name)
            $('#addCart').modal('show');

            //console.log(response); //hiện thị log() nếu cần.
        },
        error: function (response) {
            alert('Add failed.');
            console.log(response);
        },
    });
}
