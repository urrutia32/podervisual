$(document).ready(function(){
	$("#navSolar").click(function(){
		esconder();
		var data = {
			accion:"traer",
			tipo:"solar"
		}
		$.ajax({
			type:'POST',
			url:"assets/php/catalogo.php",
			datatype:'html',
			data:data,
			success:function(respuesta){
				$("#solar").html(respuesta);	
				$("#solar").fadeIn();
			}
		});
	});
	$(document).on("click", ".ver",function(evt){
		var id = evt.target.id;
		var data ={
			ids:id,
			accion:"detalle",
			tipo:""
		}
		$.ajax({
			type:"POST",
			url:"assets/php/catalogo.php",
			datatype:'html',
			data:data,
			success:function(respuesta){
				$("#modLente .mod").html (respuesta);
				$("#modLente").fadeIn();
			}
		})
	});
});
function esconder(){
	$(".tipo").fadeOut();
}
function modal(id){
	var data ={
		ids:id
	}
}