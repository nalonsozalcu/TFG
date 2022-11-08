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
				<div class="row d-flex justify-content-left mt-5">
					<h3>Solicitudes</h3>
				</div>
				<div class="row d-flex justify-content-center mt-4">
				<?php
					$solicitudes = Usuario::get_user_solicitudes_by_id($_SESSION["idUsuario"]);
					if($solicitudes){?>
						<ul class="list-group list-group-flush">
							<?php foreach($solicitudes as $user){?>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-2 col-sm-2">
												<img class="rounded-circle" width="100px" src="../files/users/<?php echo($user["username"]) ?>/<?php echo($user["avatar"]) ?>" alt="user">
											</div>
											<div class="col-md-6 col-sm-7">
												<h5><a href="#" class="profile-link"><?php echo($user["username"]) ?></a></h5>
												<p><?php echo($user["nombre"]) ?></p>
												<p class="text-muted"><?php echo($user["email"]) ?></p>
											</div>
											<div class="col-md-4 col-sm-3 align-self-center">
												<a href="../api/contactos.php?action=acept&id=<?php echo($user["id"]) ?>" class="btn btn-success pull-right"><i class="bi bi-person-check-fill"></i></a>
												<a href="../api/contactos.php?action=discard&id=<?php echo($user["id"]) ?>" class="btn btn-danger pull-right"><i class="bi bi-person-x-fill"></i></a>
											</div>
										</div>
									</li>
									<br>
							<?php } ?>
						</ul>
				<?php }else{
					echo("<p>No hay solicitudes nuevas.</p>");
				} ?>
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