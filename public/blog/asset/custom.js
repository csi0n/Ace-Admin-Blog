/**
 * Created by csi0n on 9/30/16.
 */
var customJs = function () {
    var a = function () {
        setInterval(function () {
            $('.mdl-loading').hide();
        },1000);
        $('.mdl-scroll-top').click(function () {
            $('.mdl-layout__content').animate({scrollTop:0}, 'slow');
        });
    };
    return {
        init: a
    }
}