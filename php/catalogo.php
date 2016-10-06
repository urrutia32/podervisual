<?php
	include_once("conexion.php");
	$accion =$_POST['accion'];
	$tipo = $_POST['tipo'];
	$cone = new cone;
	$con = $cone -> con();
	switch ($accion) {
		case 'traer':
			$sql='CALL catalogo("'.$tipo.'")';
			$res = $con->prepare($sql);
			$res -> execute();
			while($row = $res->fetch()){
				$id = $row['id'];
				$marca = $row['marca'];
				$modelo = $row['modelo'];
				$descripcion = $row['descripcion'];
				$precio = $row['precio'];
				$precioAnterior = $row['precioAnterior'];
				$url = $row['url'];
				?>
				<div class="col-md-4">
					<div id="<?php echo $id; ?>" class="articulo">
						<div class="imagen" style="background-image:url(<?php echo $url; ?>)">
							<div class="marca <?php echo $marca; ?>"></div>
							<div class="precio">
								<span class="precioAnterior">$<?php echo $precioAnterior; ?></span>
									$<?php echo $precio; ?>
							</div>
						</div>
						<div class="descripcion"><?php echo $descripcion; ?></div>
						<div id="<?php echo $id; ?>" class="boton añadir"> Añadir al carrito</div>
						<div id="<?php echo $id; ?>" class="boton ver"> Ver Más </div>
					</div>
				</div>
				<?php
			}
		break;
		case "detalle":
			$id = $_POST['ids'];
			$sql='CALL modLente("modal",'.$id.')';
			$res = $con->prepare($sql);
			$res->execute();
			while($row = $res->fetch()){
				?>
				<div class="col-md-8">
					<div class="imagen" style="background-image:url(<?php echo $row['url']; ?>)">
					</div>
					<div class="imagenes">
						<?php
							$i=0;
							$sql2 = 'CALL modLentes("imagenes",'.$id.')';
							$res2 = $con->prepare($sql2);
							$res2->execute();
							while($row2 = $res2->fetch()){
								$i++;
								if($i<4){
									?>
									<div class="img1" style="background-image:url(<?php echo $row2['url']; ?>)">
									</div>
									<?php		
								}
							}
						?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="info">
						<div class="descripcion">
							<?php echo $row['descripcion']; ?>
						</div>
						<div class="marca <?php echo $row['marca']; ?>">
						</div>
						<div class="tipo">
							<?php echo $row['tipo']; ?>
						</div>
						<p class="precio">
							<?php echo $row['precio']; ?> 
						</p>		
					</div>
					<div id="<?php echo $row['id']; ?>" class="boton añadir">Elegir</div>
				</div>

				<?php
			}
		break;
	}
?>