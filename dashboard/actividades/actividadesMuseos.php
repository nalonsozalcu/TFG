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
				$query = sprintf("SELECT * FROM categorias_museos");
				$rs = $conn->query($query);
				$categorias = $rs->fetch_all(MYSQLI_ASSOC);
				foreach ($categorias as $i => $value):?>
					<li><a class="dropdown-item" href="actividadesPage.php?table=museo&categoria=<?php echo($categorias[$i]["categoria"])?>"><?php echo($categorias[$i]["categoria"])?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	<div class="col-auto ms-4">
		<a href="actividadesPage.php?table=museo&localizacion=true" class="btn btn-primary">Buscar por localizacion</a>
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