'use strict';

$('#review_button').click(function () {
    var name = $('#name');
    var text = $('#text');
    sendPost(name.val(), text.val());
    newPost(name.val(), text.val());
    name.val('');
    text.val('');

});
function sendPost(name, text) {
    var str = 'name=' + name + '&text=' + text;
    $.ajax({
        type: 'post',
        url: 'send_review.php',
        data: str,
        success: function (answ) {
            // $('#answer').html(answ);
        }
    })
}
function newPost(name, text){
    var d = new Date();
    function frmtNum(num){
        if (num < 10) return "0"+num;
        return num;
    }
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1;
    var curr_year = d.getFullYear();
    var curr_h = d.getHours();
    var curr_m = d.getMinutes();
    var curr_s = d.getSeconds();
    var formatedDate = curr_year + "-" + frmtNum(curr_month) + "-" + frmtNum(curr_date) + " "
        + frmtNum(curr_h)+":"+frmtNum(curr_m)+":"+frmtNum(curr_s);

    var newTr = document.createElement('tr');
    var newTd = newTr.appendChild(document.createElement('td'));
    newTd.innerHTML = name;
    newTd = newTr.appendChild(document.createElement('td'));
    newTd.innerHTML = formatedDate;

    $('.reviews table').append(newTr);
    newTr = document.createElement('tr');
    newTd = newTr.appendChild(document.createElement('td'));
    newTd.innerHTML = text;
    newTd.colSpan = 2;
    $('.reviews table').append(newTr);
}