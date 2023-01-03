<!DOCTYPE html>
<?php
	require_once "../includes/head.html";
	require_once '../config.php'
?>

<body>
	<!-- ENCABEZADO -->
	<?php
	require_once "../includes/header.php";
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- CUERPO -->
	<!-- Here is our page's main content -->
	<main>
		<div class="vh-80 d-flex justify-content-center align-items-center">
			<div class="container">
				<div class="row d-flex justify-content-center mt-4">
					<div class="card bg-white">
					<div class="card-body p-5">
						<form class="form row g-3" method="POST" action="../api/signup.php" enctype="multipart/form-data">
							<h2 class="fw-bold mb-2">PlanWays</h2>
							<p class=" mb-5">Please enter your information</p>
							<div class="col-md-4">
								<label for="validationDefault01" class="form-label">Nombre</label>
								<input type="text" class="form-control" id="validationDefault01" name="nombre" required>
							</div>
							<div class="col-md-4">
								<label for="validationDefault02" class="form-label">Apellidos</label>
								<input type="text" class="form-control" id="validationDefault02" name="apellidos" required>
							</div>
							<div class="col-md-4">
								<label for="validationDefaultUsername" class="form-label">Username</label>
								<div class="input-group">
								<span class="input-group-text" id="inputGroupPrepend2">@</span>
								<input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="username" required>
								</div>
							</div>
							<div class="col-md-12">
								<label for="inputEmail" class="form-label">Email</label>
								<input type="email" class="form-control" id="inputEmail" name="email" required>
							</div>
							<?php if(isset($_GET["userexists"])){
								if($_GET["userexists"] == 'true')
									echo ('<p class="text-danger">El usuario ya esta registrado.</p>');
							} ?>
							<div class="col-md-6">
								<label for="inputPassword" class="form-label">Contraseña</label>
								<input type="password" class="form-control" id="inputPassword" name="password" placeholder="****" required>
							</div>
							<div class="col-6">
								<label for="inputPassword2" class="form-label">Verifica la contraseña</label>
								<input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="****" required>
							</div>
							<?php if(isset($_GET["regpass"])){
								if($_GET["regpass"] == 'false')
									echo ('<p class="text-danger">Las contraseñas deben coincidir.</p>');
							} ?>
							<div class="col-6">
							<label for="formFile" class="form-label">Foto de perfil</label>
							<input class="form-control" type="file" id="formFile" name="avatar">
							<?php if(isset($_GET["ext"])){
								if($_GET["ext"] == 'false')
									echo ('<p class="text-danger">Extension no permitida, elija un archivo JPEG o PNG.</p>');
							} ?>
							<?php if(isset($_GET["tam"])){
								if($_GET["tam"] == 'false')
									echo ('<p class="text-danger">El tamaño del archivo debe ser menor de 2 MB</p>');
							} ?>
							</div>
							<div class="row">
								<h5 class="fw-bold mb-2 mt-4">Actividades</h5>
								<p class="text-warning mb-2 mt-2">Selecciona al menos una categoría para cada tipo.</p>
								<div class="col-3">
									<label for="museos" class="form-label"><h6>Museos</h6></label>
									<?php
									$conn = Aplicacion::getConexionBD();
									$query = sprintf("SELECT * FROM categorias_museos");
									$rs = $conn->query($query);
									$categorias = $rs->fetch_all(MYSQLI_ASSOC);?>
									<div class="form-group">
										<select class="form-control selectpicker" name="cat_museo[]" multiple data-live-search="true" required>
										<?php foreach ($categorias as $i => $value):?>
											<option value="<?php echo($categorias[$i]["id"])?>"><?php echo($categorias[$i]["categoria"])?></option>
										<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label for="eventos" class="form-label"><h6>Eventos</h6></label>
									<?php
									$conn = Aplicacion::getConexionBD();
									$query = sprintf("SELECT * FROM categorias_eventos");
									$rs = $conn->query($query);
									$categorias = $rs->fetch_all(MYSQLI_ASSOC);?>
									<div class="form-group">
										<select class="form-control selectpicker" name="cat_evento[]" multiple data-live-search="true" required>
										<?php foreach ($categorias as $i => $value):?>
											<option value="<?php echo($categorias[$i]["id"])?>"><?php echo($categorias[$i]["categoria"])?></option>
										<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label for="restaurantes" class="form-label"><h6>Restaurantes</h6></label>
									<?php
									$conn = Aplicacion::getConexionBD();
									$query = sprintf("SELECT * FROM categorias_restaurantes");
									$rs = $conn->query($query);
									$categorias = $rs->fetch_all(MYSQLI_ASSOC);?>
									<div class="form-group">
										<select class="form-control selectpicker" name="cat_restaurante[]" multiple data-live-search="true" required>
										<?php foreach ($categorias as $i => $value):?>
											<option value="<?php echo($categorias[$i]["id"])?>"><?php echo($categorias[$i]["categoria"])?></option>
										<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label for="monumentos" class="form-label"><h6>Monumentos</h6></label>
									<?php
									$conn = Aplicacion::getConexionBD();
									$query = sprintf("SELECT * FROM categorias_monumentos");
									$rs = $conn->query($query);
									$categorias = $rs->fetch_all(MYSQLI_ASSOC);?>
									<div class="form-group">
										<select class="form-control selectpicker" name="cat_monumento[]" multiple data-live-search="true" required>
										<?php foreach ($categorias as $i => $value):?>
											<option value="<?php echo($categorias[$i]["id"])?>"><?php echo($categorias[$i]["categoria"])?></option>
										<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label for="audiencia" class="form-label"><h6>Audiencia</h6></label>
									<?php
										$conn = Aplicacion::getConexionBD();
										$query = sprintf("SELECT * FROM audiencia_eventos");
										$rs = $conn->query($query);
										$audiencia = $rs->fetch_all(MYSQLI_ASSOC);?>
										<div class="form-group">
											<select class="form-control selectpicker" name="audiencia[]" multiple data-live-search="true">
											<?php foreach ($audiencia as $i => $value):?>
												<option value="<?php echo($audiencia[$i]["id"])?>"><?php echo($audiencia[$i]["tipo"])?></option>
											<?php endforeach; ?>
											</select>
										</div>
								</div>
							</div>
							<div class="d-grid">
								<button type="submit" class="btn btn-outline-primary">Sign in</button>
							</div>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- PIE DE PÁGINA -->
	<?php
	require_once "../includes/footer.php";
	?>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>


</body>

</html>