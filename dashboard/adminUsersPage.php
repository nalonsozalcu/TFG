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
				<div class="col-12 d-flex justify-content-end">
				<?php
					if(isset($_GET['ok'])){
						if($_GET['ok'] == "true")
							echo '<div class="col-4 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha eliminado correctamente el usuario
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
						else
							echo '<div class="col-4 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No ha sido posible eliminar el usuario
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

					}
				?>
				</div>
				<div class="row d-flex justify-content-center">
				<div class="col-12 col-md-8 col-lg-6">
					<div class="card bg-white">
					<div class="card-body p-5">
						<table class="table">
							<thead>
								<tr>
								<th scope="col"></th>
								<th scope="col">Rol</th>
								<th scope="col">Username</th>
								<th scope="col">Email</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$users = Usuario::get_all_users();
								foreach ($users as $i => $value) {
									echo('<tr>');
									echo('<th scope="row">'.($i + 1).'</th>');
									echo('<td>'.$users[$i]["rol"].'</td>');
									echo('<td>'.$users[$i]["username"].'</td>');
									echo('<td>'.$users[$i]["email"].'</td>');
									echo('<td><a href="../api/deleteUser.php?id='.$users[$i]["id"].'" class="btn"><i class="bi bi-trash3"></i></a></td>');
									echo('</tr>');
								}?>
							</tbody>
						</table>
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