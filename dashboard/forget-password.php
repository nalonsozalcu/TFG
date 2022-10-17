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
	<main>
		<div class="vh-80 d-flex justify-content-center align-items-center">
			<div class="container">
				<div class="row d-flex justify-content-center">
				<div class="col-12 col-md-8 col-lg-6">
					<div class="card bg-white">
					<div class="card-body p-5">
						<form class="form mb-3 mt-md-4" method="POST" action="../api/forget-pwd.php">
							<h2 class="fw-bold mb-2">PlanWays</h2>
							<p class=" mb-5">Introduzca su email para enviarte una nueva contraseña</p>
							<div>
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
								<p class="small"></p>
								<div class="d-grid">
								<a class="btn btn-outline-primary" href="../api/forget-pwd.php" type="submit">ENVIAR</a>
							    </div>
								
             					 
             					
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
	require_once "../includes/footer.php";
	?>

</body>
</html>