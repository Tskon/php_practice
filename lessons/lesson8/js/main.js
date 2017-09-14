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

// -registration
$(".basket input[type='button']").click(function () {
    const str = 'm=basket&type=fillBasket';
    ajaxRequest(str, function (msg) {
        if (!msg) return;
        let result = JSON.parse(msg);
        console.log(result);
        let str2 = '';
        result.forEach(function (obj) {
            str2 += obj.id + '/';
        });
        document.location.href = 'http://' + document.location.host + '/index.php/order/newOrder/' + str2;
    });

});

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
$('.del_from_order_button').click(function (e) {

});