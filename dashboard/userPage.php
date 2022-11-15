<?php require_once '../config.php';?>

<!DOCTYPE html>
<?php
	require_once "../includes/head.html";
?>

<body>
	<!-- ENCABEZADO -->
	<?php
	require_once "../includes/header.php";
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- CUERPO -->
	<!-- Here is our page's main content -->
	<?php
		$usuario = Usuario::get_user_by_id($_GET["id"]);
	?>
	<main>
		<div class="container">

			<div class="row mt-3 gutters-sm">
				<div class="col-md-4 mb-3">
					<div class="card">
						<div class="card-body">
						<div class="d-flex flex-column align-items-center text-center">
							<img src="../files/users/<?php echo($usuario["username"]) ?>/<?php echo($usuario["avatar"]) ?>" alt="Admin" class="rounded-circle" width="150">
							<div class="mt-3">
							<h4><?php echo($usuario["username"]) ?></h4>
							</div>
						</div>
						</div>
					</div>
					<div class="card mt-3 mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3">
							<h6 class="mb-0">Full Name</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								<?php echo($usuario["nombre"]) ?>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
							<h6 class="mb-0">Email</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								<?php echo($usuario["email"]) ?>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
							<h6 class="mb-0">Phone</h6>
							</div>
							<div class="col-sm-9 text-secondary">
							(239) 816-9029
							</div>
						</div>
					</div>
					</div>
					<div class="row">
							<div class="col-6">
							<a class="link-danger">Eliminar contacto</a>
							</div>
						</div>
				</div>
				<div class="col-md-8">
				<div class="row gutters-sm">
					<div class="col-sm-6 mb-3">
					<div class="card h-100">
						<div class="card-body">
							<h4 class="d-flex align-items-center mb-3"><i class="material-icons text-primary mr-2">Actividades</i></h4>
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre actividad</h6>
									<a class="btn"><i class="bi bi-suit-heart" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre actividad</h6>
									<a class="btn"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre actividad</h6>
									<a class="btn"><i class="bi bi-suit-heart" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre actividad</h6>
									<a class="btn"><i class="bi bi-suit-heart" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre actividad</h6>
									<a class="btn"><i class="bi bi-suit-heart" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre actividad</h6>
									<a class="btn"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre actividad</h6>
									<a class="btn"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>
								</li>
							</ul>
						</div>
					</div>
					</div>
					<div class="col-sm-6 mb-3">
					<div class="card h-100">
						<div class="card-body">
							<h4 class="d-flex align-items-center mb-3"><i class="material-icons text-primary mr-2">Planes</i></h4>
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre plan</h6>
									<a class="btn"><i class="bi bi-suit-heart" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre plan</h6>
									<a class="btn"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre plan</h6>
									<a class="btn"><i class="bi bi-suit-heart" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre plan</h6>
									<a class="btn"><i class="bi bi-suit-heart" style="color: red;"></i></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6>Nombre plan</h6>
									<a class="btn"><i class="bi bi-suit-heart" style="color: red;"></i></a>
								</li>
								</li>
							</ul>
						</div>
					</div>
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

</body>
</html>