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
$(function() {
    $("submit,:submit").on('click', function(e) {
        e.preventDefault();
        $(this).attr('disabled', 'disabled');
        $(this).closest('form').submit();
        return false;
    });
});

/* 
 * ブラウザバック対応
 */
var ua = navigator.userAgent.toLowerCase();
var isSafari = (ua.indexOf('safari') > -1) && (ua.indexOf('chrome') === -1);
if (isSafari) {
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
} else {
    $(window).unload(function(){});
}
