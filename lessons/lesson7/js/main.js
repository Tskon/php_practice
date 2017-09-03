'use strict';

$('button.to_basket_button').click(function (event) {
    ajaxRequest('')

});


function ajaxRequest(dataStr, successFunc, urlStr = 'server.php'){
    $.ajax({
        type: 'post',
        url: urlStr,
        data: dataStr,
        success: function(msg){
            successFunc(msg);
        }
    });
}
