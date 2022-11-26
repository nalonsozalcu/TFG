<?php require_once '../config.php'; ?>
<!DOCTYPE html>
<?php 
	if(isset($_GET["categoria"])){
		$nombre =  $_GET["categoria"];
		$restaurante = Restaurante::get_all_restaurantes_by_categoria($nombre);
	}else{
		$restaurante = Restaurante::get_all_restaurantes();
	}
	?>

<div class="input-group">
	<form method="POST">
		<div class="input-group">
			<input type="search" class="form-control" name="busqueda" placeholder="Buscar..." aria-label="Buscar" required>
			<button type="submit" class="btn btn-primary">
				<i class="fas fa-search"></i>
			</button>
		</div>
	</form>
	<div class="col-auto ms-4">
		<div class="input-group-append">
			<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Filtrar por categoria</button>
			<ul class="dropdown-menu dropdown-menu-end">
				<?php
				$conn = Aplicacion::getConexionBD();
				$query = sprintf("SELECT * FROM categorias_restaurantes");
				$rs = $conn->query($query);
				$categorias = $rs->fetch_all(MYSQLI_ASSOC);
				foreach ($categorias as $i => $value):?>
					<li><a class="dropdown-item" href="actividadesPage.php?table=restaurante&categoria=<?php echo($categorias[$i]["categoria"])?>"><?php echo($categorias[$i]["categoria"])?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>
<div class="container mt-3">
	<?php
		if($restaurante):
			$i = 0;
			while($i < count($restaurante)):
				$j = 0;
			?>
			<div class="row mt-2 mb-3">
			<?php while ($j < 3):
					$set = true;
					if($i < count($restaurante)):
						if(isset($_POST["busqueda"])){
							$nombre = $_POST["busqueda"];
							if(!str_contains(strtolower($restaurante[$i]["nombre"]),  strtolower($nombre))) {
								$set = false;
							}
						}
						if($set):?>
						<div class="col-4">
							<div class="card h-100">
								<div class="card-body">
									<h5><i class="fa-solid fa-utensils"></i><a href="actividadPage.php?content=restaurante&id=<?php echo($restaurante[$i]["id"]) ?>" class="ms-3 card-link" style="text-decoration:none"><?php echo($restaurante[$i]["nombre"])?></a></h5>
									<p class="card-text mb-2"><?php echo($restaurante[$i]["direccion"])?></p>
									<?php 
									if(Restaurante::get_global_valoracion($restaurante[$i]["id"])){
										for($e=1; $e < 6; $e++){
											if($e <= Restaurante::get_global_valoracion($restaurante[$i]["id"])){
												echo('<i class="bi bi-star-fill text-warning ms-1"></i>');
											}else{
												echo('<i class="bi bi-star-fill ms-1"></i>');
											}
										}
									}?>
									<div class="text-end">
										<?php
										if(Usuario::is_favorito($_SESSION["idUsuario"], "restaurante", $restaurante[$i]["id"])){ 
											echo('<a href="../api/favoritos.php?from=acts&action=delete&id='.Usuario::is_favorito($_SESSION["idUsuario"], "restaurante", $restaurante[$i]["id"]).'&tipo=restaurante&id_actividad='.$restaurante[$i]["id"].'" class="btn ms-1"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>');
										}else{
											echo('<a href="../api/favoritos.php?from=acts&action=new&tipo=restaurante&id_actividad='.$restaurante[$i]["id"].'" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>');
										}
										?>
									</div>
								</div>
							</div>
						</div>
				<?php	else: $j--;
						endif;
					endif;
					$i++;
					$j++;
				endwhile;
				?>
			</div>
			<?php
			endwhile; 
		endif;
	?>
</div>