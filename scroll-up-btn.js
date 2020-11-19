jQuery(function(){
    $(function () {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 500 ) {
                $('#scroll-up-btn').css('right','10px');
            } else { 
                $('#scroll-up-btn').removeAttr( 'style' );
            }
        })  
    })
})