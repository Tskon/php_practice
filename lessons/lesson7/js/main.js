'use strict';
window.onload = function () {
    const str = 'type=fillBasket';
    ajaxRequest(str, function (msg) {
        if (!msg) return;
        fillBasket(JSON.parse(msg));
        console.log(JSON.parse(msg));
    });
};

$('button.to_basket_button').click(function (event) {
    const str = 'type=addToBasket&id=' + event.target.id;
    ajaxRequest(str, function (msg) {
        fillBasket(JSON.parse(msg));
        console.log(JSON.parse(msg));
    });
});

function fillBasket(arr) {
    const basketList = $('.basket ul');
    basketList.html('');
    arr.forEach(function (obj) {
        const productLi = document.createElement('li');
        let inner = obj.name + ': ' + obj.coast + ' р.';
        productLi.innerHTML = inner;
        basketList.append(productLi);
    })
}

function ajaxRequest(dataStr, successFunc, urlStr = 'server.php') {
    $.ajax({
        type: 'post',
        url: urlStr,
        data: dataStr,
        success: function (msg) {
            successFunc(msg);
        }
    });
}
