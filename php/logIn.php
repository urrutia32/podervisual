<?php
	$id=0;
	$tipo="nada";
	session_start();
	include_once("conexion.php");
	$cone = new cone;
	$con = $cone->con();
	$usu = $_POST['usuario'];
	$pass = $_POST['pass'];
	$sql ='CALL login("'.$usu.'","'.$pass.'",@id,@tipo)';
	$res=$con->prepare($sql);
	$res->execute();
	while ($row = $res->fetch()) {
		$id=$row['_id'];
		$tipo=$row['_tipo'];
	}
	$_SESSION['id']=$id;
	$_SESSION['tipo']=$tipo;
	echo $tipo;
?>