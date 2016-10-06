<?php
	session_start();
	$html = "¯\_(ツ)_/¯";
	if(isset($_SESSION['tipo'])){
		if($_SESSION['tipo']==="cliente"){
            $html = '<div id="carrito" class="log"><i class="fa fa-shopping-bag" aria-hidden="true"></i><div id="cantidad">(0)</div></div>';
        }
	}else{
		$html = '<div id="logIn" class="log"> Log In</div>';
	}
	echo $html;
?>