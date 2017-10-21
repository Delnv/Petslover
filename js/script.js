 $(function(){
			var nav = $('#headernav');
			$(window).scroll(function () {
				if ($(this).scrollTop() > 90) {
					nav.addClass("menuFixo");
				} else {
					nav.removeClass("menuFixo");
				}
			});
		});

  /*
 jQuery("document").ready(function($){

    var nav = $('#headernav');

    $(window).scroll(function () {
        if ($(this).scrollTop() &gt; 100) {
           nav.addClass("menu-fixo");
       } else {
          nav.removeClass("menu-fixo");
       }
    });

});  	*/
