'use strict';
window.onload = function () {
    const str = 'type=fillBasket';
    ajaxRequest(str, function (msg) {
        if (!msg) return;
        console.log(msg);
        fillBasket(JSON.parse(msg));
    });
};

$('button.to_basket_button').click(function (event) {
    const str = 'type=addToBasket&id=' + event.target.id;
    console.log(str + event.target);
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
    })
    $('#totalCoast').html(sum);
}

function delFromBasket() {
    const str = 'type=delFromBasket&id=' + this.classList;
    ajaxRequest(str, function (msg) {
        fillBasket(JSON.parse(msg));
    });
}
function ajaxRequest(dataStr, successFunc, urlStr = './models/ajaxServer.php') {
    $.ajax({
        type: 'post',
        url: urlStr,
        data: dataStr,
        success: function (msg) {
            successFunc(msg);
        }
    });
}
