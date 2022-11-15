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
		$usuario = Usuario::get_user_from_email($_SESSION["email"]);
	?>
	<main>
		<div class="vh-80 d-flex justify-content-center align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-8">
						<div class="row d-flex justify-content-left mt-5">
							<h3>Contactos</h3>
						</div>
						<div class="row d-flex justify-content-right mt-4">
						<?php $contactos = Usuario::get_user_contactos_by_id($_SESSION["idUsuario"]);
								if($contactos){?>
								<ul class="list-group list-group-flush">
								<?php foreach($contactos as $user){?>
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-2 col-sm-2">
													<img class="rounded-circle" width="100px" src="../files/users/<?php echo($user["username"]) ?>/<?php echo($user["avatar"]) ?>" alt="user">
												</div>
												<div class="col-md-9 col-sm-9">
													<h5><a href="userPage.php?id=<?php echo($user["id"])?>" class="profile-link"><?php echo($user["username"]) ?></a></h5>
													<p><?php echo($user["nombre"]) ?></p>
													<p class="text-muted"><?php echo($user["email"]) ?></p>
												</div>
												<div class="col-md-1 col-sm-1 align-self-center">
													<button type="button" class="btn btn-danger pull-right" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($user["id"])?>"><i class="bi bi-person-dash-fill"></i></button></td>
													<div class="modal fade" id="DeleteUserModal<?php echo($user["id"])?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteUserModalLabel<?php echo($user["id"])?>" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="DeleteUserModalLabel<?php echo($user["id"])?>">Confirm deletion</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																You are going to delete the user with username: <?php echo($user["username"])?>
																Are you sure you want to delete?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
																<a href="../api/contactos.php?action=delete&id=<?php echo($user["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
															</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<br>
								<?php }?>
								</ul>
								<?php
							}else{
								echo("<p>Todavía no tienes contactos.</p>");
								} ?>
						</div>
					</div>
					<div class="col">
						<div class="row d-flex justify-content-center mt-5">
							<?php
								if(isset($_GET['send'])){
									if($_GET['send'] == "true")
										echo '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha enviado correctamente la solicitud
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
									else
										echo '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No se ha enviado la solicitud de contacto
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
								}
							?>
							<button class="col-8 btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								<i class="bi bi-person-plus-fill"></i> Enviar solicitud de contacto
							</button>
							<div class="collapse <?php echo((isset($_GET['username']) || isset($_GET['contact']) || isset($_GET['sol_send']) || isset($_GET['sol_recived']))? 'show': '')?>" id="collapseExample">
								<div class="mt-3 card card-body">
								<form class="form mb-3 mt-md-2" method="POST" action="../api/contactos.php?action=send">
									<h5 class="mb-3">Añadir contacto</h5>
									<div class="row">
										<div class="col mb-3">
											<div class="form-group">
												<label for="username" class="form-label ">Username</label>
												<input type="text" id="username" name="username" class="form-control" required/>
											</div>
										</div>
										<div class="col-2 mb-3 align-self-end">
											<button class="btn btn-primary" type="submit"><i class="bi bi-send-fill"></i></button>
										</div>
										<?php 
											if(isset($_GET["username"])){
												if($_GET["username"] == 'false')
													echo ('<p class="text-danger">El usuario no existe.</p>');
											} 
											if(isset($_GET["sol_send"])){
												if($_GET["sol_send"] == 'true')
													echo ('<p class="text-danger">Ya has enviado una solicitud a este usuario.</p>');
											}
											if(isset($_GET["sol_recived"])){
												if($_GET["sol_recived"] == 'true')
													echo ('<p class="text-danger">Has recibido una solicitud de este usuario.</p>');
											}
											if(isset($_GET["contact"])){
												if($_GET["contact"] == 'true')
													echo ('<p class="text-danger">Este usuario ya es tu contacto.</p>');
											}
										?>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

</body>
</html>