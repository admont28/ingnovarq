function cargador(){
	var lienzo = document.getElementById('lienzo');
	var lienzo1 = lienzo.getContext('2d');
		// gradiente lineal horizontal
	var gradienteLineal = lienzo1.createLinearGradient(0,0,220,0); 
	gradienteLineal.addColorStop(0, '#8DB342');
    gradienteLineal.addColorStop(1, '#229E4D');
    lienzo1.fillStyle = gradienteLineal;

  	lienzo1.beginPath();
	lienzo1.moveTo(0,0);
	lienzo1.lineTo(300,0);
	lienzo1.lineTo(300,110);
	lienzo1.lineTo(285,110);
	lienzo1.lineTo(280,90);
	lienzo1.lineTo(20,90);
	lienzo1.lineTo(15,110);
	lienzo1.lineTo(0,110);	
	lienzo1.lineTo(0,0);
	lienzo1.closePath();
	lienzo1.fill();
	


}