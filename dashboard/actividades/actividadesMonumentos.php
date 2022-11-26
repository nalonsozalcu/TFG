<?php require_once '../config.php'; ?>
<!DOCTYPE html>
<?php 
	if(isset($_GET["categoria"])){
		$nombre =  $_GET["categoria"];
		$monumento = Monumento::get_all_monumentos_by_categoria($nombre);
	}else{
		$monumento = Monumento::get_all_monumentos();
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
				$query = sprintf("SELECT * FROM categorias_monumentos");
				$rs = $conn->query($query);
				$categorias = $rs->fetch_all(MYSQLI_ASSOC);
				foreach ($categorias as $i => $value):?>
					<li><a class="dropdown-item" href="actividadesPage.php?table=monumento&categoria=<?php echo($categorias[$i]["categoria"])?>"><?php echo($categorias[$i]["categoria"])?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>
<div class="container mt-3">
	<?php
		if($monumento):
			$i = 0;
			while($i < count($monumento)):
				$j = 0;
			?>
			<div class="row mt-2 mb-3">
			<?php while ($j < 3):
					$set = true;
					if($i < count($monumento)):
						if(isset($_POST["busqueda"])){
							$nombre = $_POST["busqueda"];
							if(!str_contains(strtolower($monumento[$i]["nombre"]),  strtolower($nombre))) {
								$set = false;
							}
						}
						if($set):?>
						<div class="col-4">
							<div class="card h-100">
								<div class="card-body">
									<h5><i class='fa-regular fa-calendar-check'></i><a href="actividadPage.php?content=monumento&id=<?php echo($monumento[$i]["id"]) ?>" class="ms-3 card-link" style="text-decoration:none"><?php echo($monumento[$i]["nombre"])?></a></h5>
									<p class="card-text mb-2"><?php echo($monumento[$i]["direccion"])?></p>
									<?php 
									if(Monumento::get_global_valoracion($monumento[$i]["id"])){
										for($e=1; $e < 6; $e++){
											if($e <= Monumento::get_global_valoracion($monumento[$i]["id"])){
												echo('<i class="bi bi-star-fill text-warning ms-1"></i>');
											}else{
												echo('<i class="bi bi-star-fill ms-1"></i>');
											}
										}
									}?>
									<div class="text-end">
										<?php
										if(Usuario::is_favorito($_SESSION["idUsuario"], "monumento", $monumento[$i]["id"])){ 
											echo('<a href="../api/favoritos.php?from=acts&action=delete&id='.Usuario::is_favorito($_SESSION["idUsuario"], "monumento", $monumento[$i]["id"]).'&tipo=monumento&id_actividad='.$monumento[$i]["id"].'" class="btn ms-1"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>');
										}else{
											echo('<a href="../api/favoritos.php?from=acts&action=new&tipo=monumento&id_actividad='.$monumento[$i]["id"].'" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>');
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