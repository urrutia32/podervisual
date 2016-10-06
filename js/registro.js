$(document).ready(function(){
	var ban= 0;
	$("#registrar").click(function(evt){
		evt.preventDefault();
		var data = {
			nombre:$("#nombre").val(),
			direccion:$("#direccion").val(),
			codigoPostal:$("#codigoPostal").val(),
			telefono:$("#telefono").val(),
			email:$("#email").val(),
			usuario:$("#usuario").val(),
			pass:$("#pass").val(),
			pass2:$("#pass2").val()
		}
		$.ajax({
			type:'POST',
			url:'assets/php/registro.php',
			data:data,
			success:function(resultado){
				$("#modExito .display").html(resultado);
				$("#modExito").fadeIn();
				if(resultado==="Usuario Creado Correctamente"){
					ban=1;
				}
					
			}
		})
	});
	$(".cerrar").click(function(){
		if(ban ===1){
			window.location.replace("index.html");
		}
	});
});