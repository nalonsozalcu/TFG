<?php require_once '../config.php'; ?>
<!DOCTYPE html>
<?php 
	if(isset($_GET["categoria"])){
		$nombre =  $_GET["categoria"];
		$museo = Museo::get_all_museos_by_categoria($nombre);
	}else{
		$museo = Museo::get_all_museos();
	}

	if(isset($_GET["localizacion"])){ ?>
		<div class="container-fluid">
			<h5 class="mt-3 mb-4">Mapa de museos</h5>
			<?php require "actividades/mapa.php"; ?>
		</div>
<?php }else{
?>
<div class="input-group row justify-content-between">
	<div class="col-8">
		<div class="row justify-content-start">
			<form class="col-6" method="POST">
				<div class="input-group">
					<input type="search" class="form-control" name="busqueda" placeholder="Buscar..." aria-label="Buscar" required>
					<button type="submit" class="btn btn-primary">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</form>
			<div class="col-auto">
				<a href="actividadesPage.php?table=museo&localizacion=true" class="btn btn-secondary"><i class="fas fa-map-marked-alt"></i></a>
			</div>
		</div>
	</div>
	<div class="col-auto">
		<?php if(empty($_POST)){?>
			<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#filtersModal">
				Filtrar
			</button>
		<?php } else{ ?>
			<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#filtersModal">
				Filtrar
			</button>
			<a href="actividadesPage.php?table=museo" type="button" class="btn btn-outline-danger">
				Eliminar filtros
			</a>
		<?php } ?>
		<div class="modal fade" id="filtersModal" tabindex="-1" aria-labelledby="filtersModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="filtersModalLabel">Filtros</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form class="form" method="POST">
						<div class="modal-body">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="val_check" id="flexCheck">
								<label for="flexCheck" class="form-label">Valoración <i class="bi bi-star-fill text-warning ms-1"></i></label>
							</div>
							<p class="form-label">0&emsp;&emsp;&emsp;&emsp;&emsp;
												1&emsp;&emsp;&emsp;&emsp;&emsp;
												2&emsp;&emsp;&emsp;&emsp;&emsp;
												3&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
												4&emsp;&emsp;&emsp;&emsp;&nbsp;5</p>
							<input type="range" class="form-range" min="0" max="5" name="valoracion" id="valoracion">
							<?php
							$conn = Aplicacion::getConexionBD();
							$query = sprintf("SELECT * FROM categorias_museos");
							$rs = $conn->query($query);
							$categorias = $rs->fetch_all(MYSQLI_ASSOC);?>
							<div class="form-group">
								<label for="categoria" class="form-label mt-3">Selecciona las categorias</label>
								<select class="form-control" name="categoria[]" multiple>
									<?php foreach ($categorias as $i => $value):?>
										<option value="<?php echo($categorias[$i]["id"])?>"><?php echo($categorias[$i]["categoria"])?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary mt-3 mb-3">Aplicar filtros</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container mt-3">
	<?php
		if($museo):
			$i = 0;
			while($i < count($museo)):
				$j = 0;
			?>
			<div class="row mt-2 mb-3">
			<?php while ($j < 3):
					$set = true;
					if($i < count($museo)):
						if(isset($_POST["busqueda"])){
							$nombre = $_POST["busqueda"];
							if(!str_contains(strtolower($museo[$i]["nombre"]),  strtolower($nombre))) {
								$set = false;
							}
						}
						if(isset($_POST["val_check"])){
							if(Museo::get_global_valoracion($museo[$i]["id"]) != $_POST["valoracion"]){
								$set = false;
							}
						}
						if(isset($_POST["categoria"])){
							foreach($_POST["categoria"] as $categoria){
								if(!Museo::has_categoria_by_id($museo[$i]["id"], $categoria)){
									$set = false;
									break;
								}
							}
						}
						if($set):?>
						<div class="col-4">
							<div class="card h-100">
								<div class="card-body">
									<h5><i class='fa-solid fa-landmark'></i><a href="actividadPage.php?content=museo&id=<?php echo($museo[$i]["id"]) ?>" class="ms-3 card-link" style="text-decoration:none"><?php echo($museo[$i]["nombre"]); if(Museo::is_tendencia($museo[$i]["id"])) echo (' <i class="bi bi-fire"></i>');?></a></h5>
									<p class="card-text mb-2"><?php echo($museo[$i]["direccion"])?></p>
									<?php 
									if(Museo::get_global_valoracion($museo[$i]["id"])){
										for($e=1; $e < 6; $e++){
											if($e <= Museo::get_global_valoracion($museo[$i]["id"])){
												echo('<i class="bi bi-star-fill text-warning ms-1"></i>');
											}else{
												echo('<i class="bi bi-star-fill ms-1"></i>');
											}
										}
									}?>
									<div class="text-end">
										<?php
										if(isset($_SESSION["idUsuario"])){
											if(Usuario::is_favorito($_SESSION["idUsuario"], "museo", $museo[$i]["id"])){ 
												echo('<a href="../api/favoritos.php?from=acts&action=delete&id='.Usuario::is_favorito($_SESSION["idUsuario"], "museo", $museo[$i]["id"]).'&tipo=museo&id_actividad='.$museo[$i]["id"].'" class="btn ms-1"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>');
											}else{
												echo('<a href="../api/favoritos.php?from=acts&action=new&tipo=museo&id_actividad='.$museo[$i]["id"].'" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>');
											}
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
<?php }
	?>