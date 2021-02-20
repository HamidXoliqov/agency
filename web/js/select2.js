$(document).ready(function () {
    $('body').delegate('.select2-selection', 'mouseup', function () {
         $(this).find('.select2-selection__rendered').css({'margin-top':'-2px', 'padding-left':'0px'});
    });
});