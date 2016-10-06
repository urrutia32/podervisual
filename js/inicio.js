$(document).ready(function(){
	var slider=$(".slider");
	var slides=$(".slider ul");
	var slide = $(".slider ul li");
	var sliderW = slides.width();
	var slideW = slide.width();
	var stop ="-"+(sliderW - slideW).toString()+"px";
	var intervalo= setInterval(function(){
		if(slides.css("margin-left")===stop){
			slides.css("margin-left","0");
		}
		slides.animate({
			marginLeft:"-="+slideW.toString()+"px"
		},900);
	},6000);
	$("#registro").click(function(){
		window.location.replace("registro.html");
	});
	$("#modLogin #entrar").click(function(evt){
		evt.preventDefault();
		logIn();//core.js
		$("#modLogin").fadeOut();
		sesion();
	});
	$(document).on("click", ".log", function(evt){
		var tipo = evt.target.id;
		switch (tipo){
			case "logIn":
				$("#modLogin").fadeIn();			
			break;
			case "carrito":
				$("#modCarrito").slideDown();
			break;
		}
	});
});