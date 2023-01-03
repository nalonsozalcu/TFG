<!DOCTYPE html>
<div class="vh-80 d-flex justify-content-center align-items-center">
	<div class="container">
		<div class="row mt-3 mb-3 d-flex justify-content-start">
			<h4>Subir datos masivos</h4>
		</div>
		<?php 
		$actividades = ["Museos", "Eventos", "Monumentos", "Restaurantes"];
		foreach($actividades as $actividad):?> 
			<div class="row mb-4">
				<div class="col-2">
					<h5 class="mb-3"><?php echo($actividad) ?></h5>
					<a href="../files/plantillas/<?php echo($actividad) ?>_Plantilla.xlsx" class="btn" style="background-color: #1eb529; color: white;" download="<?php echo($actividad) ?>_Plantilla.xlsx">Descargar plantilla <i class="bi bi-cloud-download"></i></a>
				</div>
				<form class="form col align-self-end" method="POST" action="../api/upload.php?type=<?php echo($actividad) ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-8">
							<input class="form-control" type="file" name="data" id="files">
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary">Importar datos <i class="bi bi-cloud-upload"></i></button>
						</div>
					</div>
				</form>
				<div class="col align-self-end">
				<?php 
					if(isset($_GET["type"]) && $_GET["type"] === $actividad){
						if(isset($_GET["ext"])){
							if($_GET["ext"] == 'false')
								echo ('<p class="text-danger">Extension no permitida, elija un archivo CSV o XLSX.</p>');
						} 
						if(isset($_GET["tam"])){
							if($_GET["tam"] == 'false')
								echo ('<p class="text-danger">El tamaño del archivo debe ser menor de 2 MB</p>');
						}
						if(isset($_GET["file"])){
							if($_GET["file"] == 'false')
								echo ('<p class="text-danger">No has seleccionado ningun archivo.</p>');
						}
						if(isset($_GET["ok"])){
							if($_GET["ok"] == 'true')
								echo ('<p class="text-success">Se han importado los datos correctamente. <i class="bi bi-check"></i></p>');
						}
					}
					?>
				</div>
			</div>
			<hr>
		<?php endforeach;?>
	</div>
</div>
