/* 
 * リストをリンク化
 */
jQuery( function($) {
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

