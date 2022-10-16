<!DOCTYPE html>
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
	<main>
		<div class="vh-80 d-flex justify-content-center align-items-center">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="card bg-white">
					<div class="card-body p-5">
						<form class="form row g-3" method="POST" action="../api/signup.php">
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
								<input type="email" class="form-control" id="inputEmail" name="email">
							</div>
							<div class="col-md-6">
								<label for="inputPassword" class="form-label">Contraseña</label>
								<input type="password" class="form-control" id="inputPassword" name="password" placeholder="****">
							</div>
							<div class="col-6">
								<label for="inputPassword2" class="form-label">Verifica la contraseña</label>
								<input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="****">
							</div>
							<div class="col-6">
							<label for="formFile" class="form-label">Imagen de perfil</label>
							<input class="form-control" type="file" id="formFile" name="avatar">
							</div>
							<!-- <div class="col-12">
								<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck">
								<label class="form-check-label" for="gridCheck">
									Check me out
								</label>
								</div>
							</div> -->
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

</body>
</html>

	<script type="text/javascript">
		window.addEventListener('load', function() {

			// Do it delayed instead of with autofocus because bootstrap doesn't get it and the input looks glitched
			let username_input = document.querySelector('[name=username]');
			if (username_input) {
				if (!username_input.value) {
					username_input.focus();
				} else if (username_input !== document.activeElement) {
					let password_inpput = document.querySelector('[name=password]');
					if (password_inpput)
						password_inpput.focus();
				}
			}

		});
	</script>

</html>