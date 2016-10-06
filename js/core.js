$(document).ready(function(){
	sesion();
	$("nav .logo").click(function(){
		window.location.replace("index.html");
	});
	$(".cerrar").click(function(){
		if($(".modalContenedor").is(":visible")){
			$(".modalContenedor").fadeOut();
		}
	});
	$("#modCarrito .cerrar").click(function(){

	});
	$(".cerrarSesion").click(function(){
		$.ajax({
			type:'GET',
			url:'assets/php/cerrarSesion.php',
			datatype:'html',
			success:function(){
				sesion();
				$(".cerrarSesion").fadeOut();
			}			
		})
	});
});
function sesion(){
	$.ajax({
		type:'GET',
		url:'assets/php/tipoSesion.php',
		datatype:'html',
		success:function(respuesta){
			$(".nav .log").remove();
			$(".nav").append(respuesta);
		}
	})
}
function logIn(){
	var data={
		usuario:$("#usuarioL").val(),
		pass:$("#passL").val(),
	}
	$.ajax({
		type:'POST',
		url:'assets/php/login.php',
		data:data,
		success:function(respuesta){
			$("#logIn").remove();
			sesion();
			$(".cerrarSesion").fadeIn();
		}
	});
}