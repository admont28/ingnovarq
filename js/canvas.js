function cargador(){
		
		var canvas = document.getElementById('lienzo');
        var lienzo1 = canvas.getContext('2d');
          // a. Forma abierta
        var gradienteLineal = lienzo1.createLinearGradient(0,0,1200,0); 
		gradienteLineal.addColorStop(0, '#8DB342');
	    gradienteLineal.addColorStop(1, '#009B62');
	    lienzo1.fillStyle = gradienteLineal;
		lienzo1.beginPath();
		lienzo1.moveTo(0,0);
		lienzo1.lineTo(1300,0);
		lienzo1.lineTo(1300,600);
		lienzo1.lineTo(1270,600);
		lienzo1.lineTo(1230,530);
		lienzo1.lineTo(70,530);
		lienzo1.lineTo(30,600);
		lienzo1.lineTo(0,600);	
		lienzo1.closePath();
		lienzo1.fill();
}