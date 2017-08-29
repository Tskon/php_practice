'use strict';
// Добавить отзыв
$('#review_button').click(function () {
    var name = $('#name');
    var text = $('#text');
    sendPost(name.val(), text.val());
    name.val('');
    text.val('');

});
function sendPost(name, text) {
    if (!text) return;
    var str = 'name=' + name + '&text=' + text;
    $.ajax({
        type: 'post',
        url: 'tools/send_review.php',
        data: str,
        success: function (answ) {
            $('#answer').html(answ);
        }
    })
}
// Удалить отзыв

$("input[name='delete']").click(function () {
    var saveThis = this
    if(confirm('Точно?')){
        var str = 'id=' + this.id;

        $.ajax({
            type: 'post',
            url: 'tools/delete_message.php',
            data: str,
            success: function (msg) {
                saveThis.parentNode.parentNode.innerHTML = 'Сообщение удалено!';
                console.log(msg)
            }
        })
    }
});

// Редактировать отзыв