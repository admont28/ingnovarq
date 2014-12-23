/* Nav responsivo */
$(document).ready(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();

				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});

				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 601 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	        		if(w < 601){
	        			$('nav').removeClass('paralelogramo');
	        			$('nav ul li').removeClass('cuadrado');
	        		}
	        		else{
	        			$('nav').addClass('paralelogramo');
	        			$('nav ul li').addClass('cuadrado');

	        		}
	    		});
});