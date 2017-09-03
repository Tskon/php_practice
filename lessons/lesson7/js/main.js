'use strict';

let basketCount = 0;
let totalCoast = 0;
$('button.to_basket_button').click(function (event) {
    let str = 'type=addToBasket&id=' + event.target.id;
    ajaxRequest(str, function (msg) {
        console.log(event.target.id);
        console.log(msg)
    });

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
