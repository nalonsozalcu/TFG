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
	<main>
		<div class="vh-80 d-flex justify-content-center align-items-center">
			<div class="container">
				<div class="row d-flex justify-content-center mt-4">
				<div class="col-12 col-md-8 col-lg-6">
					<div class="card bg-white">
					<div class="card-body p-5">
						<form class="form mb-3 mt-md-4" method="POST" action="../api/forgetPwd.php">
							<h2 class="fw-bold mb-2">PlanWays</h2>
							<p class=" mb-5">Introduzca su email para enviarte una nueva contraseña</p>
							<div class="form-group">
								<label for="email" class="form-label ">Email address</label>
								<div class="input-group">
									<span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-person"></i></span>
									<input
										type="email"
										id="email"
										name="email"
										class="form-control"
										placeholder="Email"
										required
									/>
								</div>
							</div>
							<div class="d-grid mt-3">
								<button class="btn btn-outline-primary" type="submit">Enviar</button>
							</div>
						</form>
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</main>

	<!-- PIE DE PÁGINA -->
	<?php
	// require_once "../includes/footer.php";
	?>

</body>
</html>