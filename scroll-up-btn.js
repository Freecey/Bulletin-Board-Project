jQuery(function(){
    $(function () {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300 ) { //if you scroll till 300px,
                $('#scroll-up-btn').css('right','10px'); //change css property so that the btn becomes visible
            } else { 
                $('#scroll-up-btn').removeAttr( 'style' ); 
            }
        })  
    })
})