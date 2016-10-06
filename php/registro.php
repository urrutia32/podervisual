<?php
	$repsuesta = "¯\_(ツ)_/¯";
	$ban = 1;
	if((!isset($_POST['pass2']))||($_POST['pass2']==="")){
		$ban=0;
		$respuesta="Repetir Contraseña";
	}
	if((!isset($_POST['pass']))||($_POST['pass']==="")){
		$ban=0;
		$respuesta="Ingresar Contraseña";
	}
	if((!isset($_POST['usuario']))||($_POST['usuario']==="")){
		$ban=0;
		$respuesta="Ingresar Usuario";
	}
	if((!isset($_POST['codigoPostal']))||($_POST['codigoPostal']==="")){
		$ban=0;
		$respuesta="Ingresar Codigo Postal";
	}
	if((!isset($_POST['telefono']))||($_POST['telefono']==="")){
		$ban=0;
		$respuesta="Ingresar Telefono";
	}
	if((!isset($_POST['direccion']))||($_POST['direccion']==="")){
		$ban=0;
		$respuesta="Ingresar Direccion";
	}
	if((!isset($_POST['nombre']))||($_POST['nombre']==="")){
		$ban=0;
		$respuesta="Ingresar Nombre";
	}	
	if($ban===1){
		if($_POST['pass']===$_POST['pass2']){
			include_once('conexion.php');
			$cone = new cone;	
			$nombre = $_POST['nombre'];
			$direccion =$_POST['direccion'];
			$codigoPostal = $_POST['codigoPostal'];
			$telefono = $_POST['telefono'];
			$usuario = $_POST['usuario'];
			$pass = $_POST['pass'];
			$sql='CALL registro("'.$nombre.'","'.$direccion.'","'.$codigoPostal.'","'.$telefono.'","'.$usuario.'","'.$pass.'")';
			$cone->ejecutar($sql);
			$respuesta="Usuario Creado Correctamente";
		}else{
			$respuesta="Las Contraseñas No Coinciden";
		}
	}
	echo $respuesta;
?>