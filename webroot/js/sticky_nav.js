$(document).ready(function() {
    if (QuickApps.sticky_admin_get_cookie('sticky_admin_position') == 'bottom') {
        QuickApps.sticky_admin_pos(0);
    } else {
        QuickApps.sticky_admin_pos(1);
    }
});

$(function() {
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        if(scrollTop != 0)
            $('#stickyNav').stop().animate({'opacity':'0.2'},400);
        else
            $('#stickyNav').stop().animate({'opacity':'1'},400);
    });

    $('#stickyNav').hover(
        function (e) {
            var scrollTop = $(window).scrollTop();

            if(scrollTop != 0){
                $('#stickyNav').stop().animate({'opacity':'1'},400);
            }
        },
        function (e) {
            var scrollTop = $(window).scrollTop();

            if(scrollTop != 0){
                $('#stickyNav').stop().animate({'opacity':'0.2'},400);
            }
        }
    );
});

QuickApps.sticky_admin_pos = function (to) {
    if (to) {
        $('#stickyNav').removeClass('stickyNav-bottom');
        $('#stickyNav').addClass('stickyNav-top');
        QuickApps.sticky_admin_set_cookie('sticky_admin_position', 'top', 360);
    } else {
        $('#stickyNav').removeClass('stickyNav-top');
        $('#stickyNav').addClass('stickyNav-bottom');
        QuickApps.sticky_admin_set_cookie('sticky_admin_position', 'bottom', 360);
    }
};

QuickApps.sticky_admin_set_cookie = function (name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else {
        var expires = "";
    }

    document.cookie = name + "=" + value + expires + "; path=/";
};

QuickApps.sticky_admin_get_cookie = function (name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');

    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }

        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length,c.length);
        }
    }

    return null;
};

QuickApps.sticky_admin_editable_blocks = function () {
    $('div.qa-block').hover(
        function () {
            var id = $(this).attr('id').split('-')[2];

            $(this).addClass('sticky-admin-block-hover');
            $(this).append($('<div class="sa-block-btns"><a href="' + QuickApps.settings.base_url  + 'admin/block/manage/edit/' + id + '"><?php echo __d('sticky_admin', 'Edit'); ?></a></div>'));
        },
        function () {
            $(this).removeClass('sticky-admin-block-hover');
            $(this).find('div.sa-block-btns:last').remove();
        }
    );
};