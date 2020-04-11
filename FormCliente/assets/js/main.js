
$(document).ready(function () {

    $(".m-menu").click(function(){



        $("#container").toggleClass("active");

        $(".m-menu").toggleClass("active");

        $(".mobile-menu").toggleClass("active");

        $(".mobile-menu-bg").addClass("active");

    });

    $('.search_box').click(function() {
        if($(this).next('.search_content').css('display') == 'none') {
            $(this).next('.search_content').css("display", "block");
        }
        else {
            $(this).next('.search_content').css('display', 'none');
        }
    });
    $('.search_close').click(function() {
        $(this).parent().parent('.search_content').css('display', 'none');
    });

    $(".mobile-menu").css('left','-200px');

    $(".mobile-menu-bg").css('left','-200px');

    $(".m-menu").toggle(function() {

            $('.mobile-menu').animate({ left: '0' }, { duration: 500, queue: false });

            $('.mobile-menu-bg').animate({ left: '0' }, { duration: 500, queue: false });

            $('#container').animate({ 'margin-left': '200px' }, { duration: 500, queue: false });

            $('#container').animate({ 'margin-right': '-200px' }, { duration: 500, queue: false });

        }, function() {

            $('.mobile-menu-bg').animate({ left: '-200' }, { duration: 500, queue: false });

            $('.mobile-menu').animate({ left: '-200' }, { duration: 500, queue: false });

            $('#container').animate({ 'margin-left': '0' }, { duration: 500, queue: false });

            $('#container').animate({ 'margin-right': '0' }, { duration: 500, queue: false });

        }

    );

})

