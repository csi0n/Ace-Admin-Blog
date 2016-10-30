/**
 * Created by csi0n on 9/30/16.
 */
var customJs = function () {
    var a = function () {
        setInterval(function () {
            $('.mdl-loading').hide();
        },3000);
    };
    return {
        init: a
    }
}