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