/* Menú pegajoso y Script para quitar las clases paralelogramo y cuadrado del menú cuando la pantalla inicial es menor a 601px  */
$(document).ready(function(){
	var nav_ul = $('nav ul');
	var left = nav_ul.offset().left - 15;
	posicionarMenu();

	$(window).resize(function(){
	    left = nav_ul.offset().left - 15;
	 });
	
	$(window).scroll(function() {    
	    posicionarMenu();
	});
	
	function posicionarMenu() {
	    var altura_header = $('header').outerHeight(true);
	    
	    var altura_del_menu = $('nav').outerHeight(true);

	    var tamaño_pantalla = $(window).width();
	
	    if (($(window).scrollTop() >= (altura_header))){
	        $('nav').addClass('fixed');
	        $('#main').css('margin-top', (altura_del_menu) + 'px');
	        $('nav').removeClass('paralelogramo');
   			$('nav ul li').removeClass('cuadrado');
			nav_ul.css('margin-left', left);
	    }
	    else{
	    	nav_ul.css('margin-left', 0);
	    	$('nav').removeClass('fixed');
	        $('#main').css('margin-top', '0');
	        $('nav').addClass('paralelogramo');
   			$('nav ul li').addClass('cuadrado');
	    }
	    if(tamaño_pantalla < 601){
	    	$('nav').removeClass('paralelogramo');
   			$('nav ul li').removeClass('cuadrado');
	    }
	} /* -- Menú pegajoso */
});