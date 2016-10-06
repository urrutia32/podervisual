<?php
	Class cone {
		function con(){
			try{
				$base = new PDO('mysql:host=localhost;dbname=poderv','patrici0','Kupisi32');
			} catch (PDOException $e){
				print "Error :". $e->getMessage() . "<br>";
			}
			return $base;
		}
		function ejecutar($sql){
			$base = $this->con();
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->exec($sql);
		}
		function campo($sql){
			$base = $this->con();
			$campo="";
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$resultado=$base->prepare($sql);
			$resultado->execute();
			$campo = $resultado->fetchColumn();
			return $campo;
		}
		function existe($sql){
			$base = $this->con();
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->query($sql);
			return $base;
		}
		function todo($sql){
			$base =$this->con();
			$base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$resultado = $base->prepare($sql);
			return $resultado;
		}
	} 
?>