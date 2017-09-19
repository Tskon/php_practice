'use strict';
// AJAX
function ajaxRequest(dataStr, successFunc, urlStr = '/controllers/ajaxServer.php') {
    $.ajax({
        type: 'post',
        url: urlStr,
        data: dataStr,
        success: function (msg) {
            successFunc(msg);
        }
    });
}
// Getters
// function getCookie(name) {
//     let matches = document.cookie.match(new RegExp(
//         "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
//     ));
//     return matches ? decodeURIComponent(matches[1]) : undefined;
// }


// Basket
window.onload = function () {
    const str = 'm=basket&type=fillBasket';
    ajaxRequest(str, function (msg) {
        if (!msg) return;
        fillBasket(JSON.parse(msg));
    });
};

$('button.to_basket_button').click(function (event) {
    const str = 'm=basket&type=addToBasket&id=' + event.target.id;
    ajaxRequest(str, function (msg) {
        fillBasket(JSON.parse(msg));
    });
});

function fillBasket(arr) {
    const basketList = $('.basket ul');
    basketList.html('');
    let sum = 0;
    arr.forEach(function (obj) {
        const productLi = document.createElement('li');
        productLi.innerHTML = obj.name + ': ' + obj.coast + ' р. ';
        const del = productLi.appendChild(document.createElement('button'));
        del.innerHTML = 'x';
        del.classList.add('id' + obj.id);
        del.addEventListener('click', delFromBasket);
        basketList.append(productLi);
        sum += obj.coast;
    });
    $('#totalCoast').html(sum);
}

function delFromBasket() {
    const str = 'm=basket&type=delFromBasket&id=' + this.classList;
    ajaxRequest(str, function (msg) {
        fillBasket(JSON.parse(msg));
    });
}
// Auth

// -registration/auth toggle
$('.toggle_button').click(function () {
    toggleFormHide();
});
function toggleFormHide() {
    $('.right_side form').toggleClass('hidden');
}

// -log out
$('.log_out').click(function () {
    const str = 'm=auth&type=logOut';
    ajaxRequest(str, function () {
        document.location.href = document.location.href
    });
});

// Order
// - New Order
$(".basket input[type='button']").click(function () {
    ajaxRequest('m=basket&type=fillBasket', function (msg) {
        // в msg список товаров, преобразуем и отправим в POST
        if (!msg) return;
        let arrId = [];
        let arrCoast = [];
        const result = JSON.parse(msg);
        result.forEach(function (item) {
            arrId.push(item.id);
            arrCoast.push(item.coast)
        });
        let str = 'm=order&type=newOrder&totalCoast=' + $('#totalCoast').html() + '&productsList=' + arrId.join('-')+ '&coastsList=' + arrCoast.join('-');
        ajaxRequest(str, function (msg) {

            document.location.href = document.location.origin + '/index.php/order/newOrder';
        });
    });
});
// $('.del_from_order_button').click(function (e) {

// });