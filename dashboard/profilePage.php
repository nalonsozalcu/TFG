<?php require_once '../config.php';?>

<!DOCTYPE html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	

	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/main.css">

	<title>PlanWays</title>
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">

</head>

<body>
	<!-- ENCABEZADO -->
	<?php
	require_once "../includes/header.php";
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- CUERPO -->
	<!-- Here is our page's main content -->
	<?php
		$usuario = Usuario::get_user_from_email($_SESSION["email"]);
	?>
	<main>
		<div class="container rounded bg-white mt-5 mb-5">
				<div class="row">
					<div class="col-md-3 border-right">
						<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../assets/img/<?php echo($usuario->avatar()) ?>"><span class="font-weight-bold"><?php echo($usuario->username()) ?></span><span class="text-black-50"><?php echo($usuario->email()) ?></span><span> </span></div>
					</div>
					<div class="col-md-5 border-right">
						<div class="p-3 py-5">
							<div class="d-flex justify-content-between align-items-center mb-3">
								<h4 class="text-right">Profile Settings</h4>
							</div>
							<form class="form" method="POST" action="../api/profile.php">
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" value="<?php echo($usuario->nombre()) ?>" placeholder="nombre" name="nombre"></div>
									<div class="col-md-6"><label class="labels">Apellidos</label><input type="text" class="form-control" value="<?php echo($usuario->apellidos()) ?>" placeholder="apellido" name="apellidos"></div>
								</div>
								<div class="row mt-3">
									<div class="col-md-12 mb-3"><label class="labels">Username</label><input type="text" class="form-control" placeholder="username" value="<?php echo($usuario->username()) ?>" name="username"></div>
									<div class="col-md-12 mb-3"><label class="labels">Email</label><input type="email" class="form-control" placeholder="email" value="<?php echo($usuario->email()) ?>" name="email"></div>
								</div>
								<div class="row mt-3">
									<div class="col-md-12 mb-3"><label class="labels">Cambiar foto de perfil</label><button type="button" class="btn" data-bs-toggle="collapse" data-bs-target="#collapseAvatar"><i class="bi bi-pencil-square"></i></button></div>
									<div class="collapse" id="collapseAvatar">
										<div class="card card-body">
											<div class="col-md-12 mb-3"><input class="form-control" type="file" id="formFile" name="avatar" value=""></div>
										</div>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-md-12 mb-3"><label class="labels">Cambiar contraseña</label><button type="button" class="btn" data-bs-toggle="collapse" data-bs-target="#collapseContraseña"><i class="bi bi-pencil-square"></i></button></div>
									<div class="collapse" id="collapseContraseña">
										<div class="card card-body">
											<div class="col-md-12 mb-3"><label class="labels">Contraseña</label><input type="text" class="form-control" placeholder="contraseña actual" value="" name="contrasenaAnt"></div>
											<div class="col-md-12 mb-3"><label class="labels">Contraseña nueva</label><input type="text" class="form-control" placeholder="contraseña nueva" value="" name="contrasenaNueva1"></div>
											<div class="col-md-12"><label class="labels">Verifica la contraseña</label><input type="text" class="form-control" placeholder="repetir contraseña" value="" name="contrasenaNueva2"></div>
										</div>
									</div>
								</div>
								<div class="mt-5 text-center">
									<button class="btn btn-primary" type="submit">Save Profile</button>
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Logout</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<div class="p-3 py-5">
							<div class="d-flex justify-content-between align-items-center experience"><span><h4>Listas de favoritos</h4></span></div><br>
							<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Actividades favoritas
									</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<ul class="list-group">
												<li class="list-group-item">An item</li>
												<li class="list-group-item">A second item</li>
												<li class="list-group-item">A third item</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Planes favoritos
									</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<ul class="list-group">
												<li class="list-group-item">An item</li>
												<li class="list-group-item">A second item</li>
												<li class="list-group-item">A third item</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Confirm logout</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Are you sure you want to Logout?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<a href="../api/logout.php"><button type="button" class="btn btn-primary">Ok</button></a>
			</div>
			</div>
		</div>
		</div>
	</main>

	<!-- PIE DE PÁGINA -->
	<?php
	require_once "../includes/footer.php";
	?>

</body>
</html>