<?php require_once '../config.php'; ?>
<!DOCTYPE html>
<?php 
	if(isset($_GET["categoria"])){
		$nombre =  $_GET["categoria"];
		$monumento = Monumento::get_all_monumentos_by_categoria($nombre);
	}else{
		$monumento = Monumento::get_all_monumentos();
	}

	if(isset($_GET["localizacion"])){ ?>
		<div class="container-fluid">
			<h5 class="mt-3 mb-4">Mapa de monumentos</h5>
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
				<a href="actividadesPage.php?table=monumento&localizacion=true" class="btn btn-secondary"><i class="fas fa-map-marked-alt"></i></a>
			</div>
		</div>
	</div>
	<div class="col-auto">
		<button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#filtros" aria-expanded="false" aria-controls="collapseExample">
			Filtrar <i class="fas fa-caret-down"></i>
		</button>
		<div class="collapse" id="filtros">
			<div class="card card-body">
				<form class="form" method="POST">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="val_check" id="flexCheck">
						<label for="flexCheck" class="form-label">Valoración <i class="bi bi-star-fill text-warning ms-1"></i></label>
					</div>
					<p class="form-label">0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5</p>
					<input type="range" class="form-range" min="0" max="5" name="valoracion" id="valoracion">
					<?php
					$conn = Aplicacion::getConexionBD();
					$query = sprintf("SELECT * FROM categorias_monumentos");
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
					<div class="text-end">
						<button type="submit" class="btn btn-primary mt-3 mb-3">Aplicar filtros</button>
					</div>
				</form>
			</div>
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
						if(isset($_POST["val_check"])){
							if(Monumento::get_global_valoracion($monumento[$i]["id"]) != $_POST["valoracion"]){
								$set = false;
							}
						}
						if(isset($_POST["categoria"])){
							foreach($_POST["categoria"] as $categoria){
								if(!Monumento::has_categoria_by_id($monumento[$i]["id"], $categoria)){
									$set = false;
									break;
								}
							}
						}
						if($set):?>
						<div class="col-4">
							<div class="card h-100">
								<div class="card-body">
									<h5><i class="fa-solid fa-monument"></i><a href="actividadPage.php?content=monumento&id=<?php echo($monumento[$i]["id"]) ?>" class="ms-3 card-link" style="text-decoration:none"><?php echo($monumento[$i]["nombre"]); if(Monumento::is_tendencia($monumento[$i]["id"])) echo (' <i class="bi bi-fire"></i>');?></a></h5>
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
										if(isset($_SESSION["idUsuario"])){
											if(Usuario::is_favorito($_SESSION["idUsuario"], "monumento", $monumento[$i]["id"])){ 
												echo('<a href="../api/favoritos.php?from=acts&action=delete&id='.Usuario::is_favorito($_SESSION["idUsuario"], "monumento", $monumento[$i]["id"]).'&tipo=monumento&id_actividad='.$monumento[$i]["id"].'" class="btn ms-1"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>');
											}else{
												echo('<a href="../api/favoritos.php?from=acts&action=new&tipo=monumento&id_actividad='.$monumento[$i]["id"].'" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>');
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