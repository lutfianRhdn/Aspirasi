$(document).ready(function () {
    $('.paralax').addClass('paralax-hide')
    $('.paralax-hide').each(e => {
        setTimeout(() => {
            $('.paralax-hide').eq(e).addClass('paralax-show');
            $('.paralax').eq(e).removeClass('paralax-hide');
        }, 1000 * e);
    })
e=0 







    // Configure/customize these variables.
    var showChar = 50; // How many characters are shown by default
    var ellipsestext = "";
    var moretext = "Read more..";
    var lesstext = "Read less";


    $('.more').each(function () {
        var content = $(this).html();

        if (content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses d-inline">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function () {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
$('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
