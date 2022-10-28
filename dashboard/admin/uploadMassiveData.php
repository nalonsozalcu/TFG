<!DOCTYPE html>
<div class="vh-80 d-flex justify-content-center align-items-center">
	<div class="container">
		<div class="row mt-3 mb-3 d-flex justify-content-start">
			<h4>Subir datos masivos</h4>
		</div>
		<div class="row mb-4">
			<div class="col-2">
				<h5 class="mb-3">Museos</h5>
				<a href="../files/plantillas/Plantilla_Museos.csv" class="btn btn-success" download="Plantilla Museos.csv">Descargar plantilla <i class="bi bi-cloud-download"></i></a>
			</div>
			<form class="form col align-self-end" method="POST" action="../api/upload.php?type=museo" enctype="multipart/form-data">
				<div class="row">
					<div class="col-8">
						<input class="form-control" type="file" name="data" id="files">
					</div>
					<div class="col-4">
						<button type="submit" class="btn btn-primary">Importar CSV <i class="bi bi-cloud-upload"></i></button>
					</div>
				</div>
			</form>
			<div class="col align-self-end">
			<?php 
				if(isset($_GET["type"]) && $_GET["type"]=== "museo"){
					if(isset($_GET["ext"])){
						if($_GET["ext"] == 'false')
							echo ('<p class="text-danger">Extension no permitida, elija un archivo CSV.</p>');
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
							echo ('<p class="text-success">Se han importado los datos del museo correctamente. <i class="bi bi-check"></i></p>');
					}
				}
				?>
			</div>
		</div>
		<hr>
		<div class="row mb-4">
			<div class="col-2">
				<h5 class="mb-3">Eventos</h5>
				<a href="../files/plantillas/Plantilla_Eventos.csv" class="btn btn-success" download="Plantilla Eventos.csv">Descargar plantilla <i class="bi bi-cloud-download"></i></a>
			</div>
			<form class="form col align-self-end" method="POST" action="../api/upload.php?type=evento" enctype="multipart/form-data">
				<div class="row">
					<div class="col-8">
						<input class="form-control" type="file" name="data" id="files">
					</div>
					<div class="col-4">
						<button type="submit" class="btn btn-primary">Importar CSV <i class="bi bi-cloud-upload"></i></button>
					</div>
				</div>
			</form>
			<div class="col align-self-end">
			<?php 
				if(isset($_GET["type"]) && $_GET["type"]=== "evento"){
					if(isset($_GET["ext"])){
						if($_GET["ext"] == 'false')
							echo ('<p class="text-danger">Extension no permitida, elija un archivo CSV.</p>');
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
							echo ('<p class="text-success">Se han importado los datos del evento correctamente. <i class="bi bi-check"></i></p>');
						}
				}
				?>
			</div>
		</div>
		<hr>
		<div class="row mb-4">
			<div class="col-2">
				<h5 class="mb-3">Monumentos</h5>
				<a href="../files/plantillas/Plantilla_Monumentos.csv" class="btn btn-success" download="Plantilla Monumentos.csv">Descargar plantilla <i class="bi bi-cloud-download"></i></a>
			</div>
			<form class="form col align-self-end" method="POST" action="../api/upload.php?type=monumento" enctype="multipart/form-data">
				<div class="row">
					<div class="col-8">
						<input class="form-control" type="file" name="data" id="files">
					</div>
					<div class="col-4">
						<button type="submit" class="btn btn-primary">Importar CSV <i class="bi bi-cloud-upload"></i></button>
					</div>
				</div>
			</form>
			<div class="col align-self-end">
			<?php 
				if(isset($_GET["type"]) && $_GET["type"]=== "monumento"){
					if(isset($_GET["ext"])){
						if($_GET["ext"] == 'false')
							echo ('<p class="text-danger">Extension no permitida, elija un archivo CSV.</p>');
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
							echo ('<p class="text-success">Se han importado los datos del monumento correctamente. <i class="bi bi-check"></i></p>');
					}
				}
				?>
			</div>
		</div>
		<hr>
		<div class="row mb-4">
			<div class="col-2">
				<h5 class="mb-3">Restaurantes</h5>
				<a href="../files/plantillas/Plantilla_Restaurantes.csv" class="btn btn-success" download="Plantilla Restaurantes.csv">Descargar plantilla <i class="bi bi-cloud-download"></i></a>
			</div>
			<form class="form col align-self-end" method="POST" action="../api/upload.php?type=restaurante" enctype="multipart/form-data">
				<div class="row">
					<div class="col-8">
						<input class="form-control" type="file" name="data" id="files">
					</div>
					<div class="col-4">
						<button type="submit" class="btn btn-primary">Importar CSV <i class="bi bi-cloud-upload"></i></button>
					</div>
				</div>
			</form>
			<div class="col align-self-end">
			<?php 
				if(isset($_GET["type"]) && $_GET["type"]=== "restaurante"){
					if(isset($_GET["ext"])){
						if($_GET["ext"] == 'false')
							echo ('<p class="text-danger">Extension no permitida, elija un archivo CSV.</p>');
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
							echo ('<p class="text-success">Se han importado los datos del restaurante correctamente. <i class="bi bi-check"></i></p>');
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
</script>