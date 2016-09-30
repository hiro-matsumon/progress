/* 
 * リストをリンク化
 */
$(function() {
    $('tbody tr[data-href]').addClass('clickable').click( function() {
        window.location = $(this).attr('data-href');
    }).find('a').hover( function() {
        $(this).parents('tr').unbind('click');
    }, function() {
        $(this).parents('tr').click( function() {
            window.location = $(this).attr('data-href');
        });
    });
});

/* 
 * 完了メッセージ
 */
$(function() {
    $('.fade.in').bind('AnimationEnd webkitAnimationEnd', function() {
        $('.alert-success').hide();
    });
});

/* 
 * 2度押し防止
 */
$(function () {
    $('form').submit(function () {
        // 押下時に[disabled]に変更するがCSSはそのまま
        var btn = $(this).find(':submit');
        var btnCss = btn.css(['color', 'background-color', 'border-color']);
        btn.attr('disabled', 'disabled');
        btn.css(btnCss);
    });
});
