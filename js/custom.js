jQuery(function($) {
	  $(document).ready( function() { 
		//navbar fixed in top
		$('.navbar-fixed').stickUp();
		
		// pagination
		$('#paging').pajinate({
			items_per_page : 5
		});
		
		/*Data tables*/
		$('#mydata').DataTable();


		/*carousel*/
		$("#myCarousel").carousel({
			interval: 500
		});
		
		/*collapse*/
		$('.collapse').collapse();

		/*nav tabs and pills*/
		$(".nav-tabs a").click(function(){
        $(this).tab('show');
    	});
		
		$(".nav-pills a").click(function(){
        $(this).pill('show');
    	});
		
		$(".nav-tabs,.nav-justified a").click(function(){
        $(this).tab('show');
    	});
		
		/*scrollapsy*/
		$('body').scrollspy({ 
		target: '.navbar' 
		});
		
		/*rating*/
		$("#rateYo").rateYo({
			rating: 2,
			fullStar: true
		  });
		
		/*scroll smooth*/
        $(".fixed-top").click(function () {
            var target = $(this.hash);
            $('body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        });

    });

    $(window).scroll(function () {
		//window scroll and fade in fixed top button
        if ($(this).scrollTop() > 100) {
            $('.fixed-top').fadeIn();
        } else {
            $('.fixed-top').fadeOut();
        }
    });
	$(window).scroll(function () {
	if ($(this).scrollTop() > 100) {
            $('.social').fadeIn();
        } else {
            $('.social').fadeIn();
        }
	});

});