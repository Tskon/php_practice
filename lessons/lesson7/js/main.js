'use strict';

window.onload = function () {
    ajaxRequest('type=productsList',function(msg){
        // console.log(msg);
    });
};

$('button.to_basket_button').click(function (event) {


});


function ajaxRequest(dataStr, successFunc, urlStr = '/tools/controller.php'){
    $.ajax({
        type: 'post',
        url: urlStr,
        data: dataStr,
        success: function(msg){
            successFunc(msg);
        }
    });
}
