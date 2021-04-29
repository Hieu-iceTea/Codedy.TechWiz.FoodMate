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
            alert('Add successful!\nProduct: ')

            location.reload(); //Tải lại trang
            console.log(response);
        },
        error: function (response) {
            alert('Add failed.');
            console.log(response);
        },
    });
}
