'use strict';
var a = 0;
var b = 0;
var operation;
var inputNum = $('input[name = "input"]');
inputNum.val(0);
var resultOut = $('.result_out');
$('input[name = "plus"]').click(function () {operInput('plus')});
$('input[name = "minus"]').click(function () {operInput('minus')});
$('input[name = "mult"]').click(function () {operInput('mult')});
$('input[name = "div"]').click(function () {operInput('div')});
$('input[name = "result"]').click(result);

function operInput(oper){
    operation = oper;
    a = parseInt(inputNum.val().replace(/[^0-9]/g, ''));
    inputNum.val('');
    resultOut.html(a);
}

function result() {
    if (!operation) {
        resultOut.html('Нажмите на кнопку операции');
        return;
    }
    b = parseInt($('input[name = "input"]').val().replace(/[^0-9]/g,""));
    inputNum.val(b);
    if (operation === 'dev' && b === 0) {
        resultOut.html('Нельзя делить на ноль');
        return;
    }
    sendPost(operation, a, b);
}
function sendPost(operation, a, b) {
    var str = 'operation=' + operation + '&num1=' + a + '&num2=' + b;
    $.ajax({
        type: 'post',
        url: 'server.php',
        data: str,
        success: function (ansv) {
            $('.result_out').html(ansv);
        }
    })
}