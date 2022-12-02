<?php require_once '../config.php';?>

<!DOCTYPE html>
<?php
	require_once "../includes/head.html";
	require_once '../classes/Evento.php';
    require_once '../classes/Museo.php';
    require_once '../classes/Restaurante.php';
    require_once '../classes/Monumento.php';
	require_once '../classes/Plan.php';
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
			<div class="row mt-5 gutters-sm">
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
							<button class="btn link-danger" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($usuario["id"])?>">Eliminar contacto</button>
							<div class="modal fade" id="DeleteUserModal<?php echo($usuario["id"])?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteUserModalLabel<?php echo($usuario["id"])?>" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="DeleteUserModalLabel<?php echo($usuario["id"])?>">Confirm deletion</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										You are going to delete the user with username: <?php echo($usuario["username"])?>
										Are you sure you want to delete?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
										<a href="../api/contactos.php?action=delete&id=<?php echo($usuario["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
									</div>
									</div>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-md-8">
				<div class="row gutters-sm">
					<div class="col-sm-6 mb-3">
					<div class="card h-100">
						<div class="card-body">
							<h4 class="d-flex align-items-center mb-3"><i class="material-icons text-dark mr-2">Actividades</i></h4>
							<ul class="list-group list-group-flush scroll">
							<?php
								$favoritos = Usuario::get_favoritos_by_id($usuario["id"]);
								if($favoritos){?>
										<?php foreach($favoritos as $favorito){
											if($favorito["tipo_actividad"] == "museo"){
												$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
												$icon = "<i class='fa-solid fa-landmark'></i>";
											}
											if($favorito["tipo_actividad"] == "restaurante"){
												$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
												$icon = '<i class="fa-solid fa-utensils"></i>';
											}
											if($favorito["tipo_actividad"] == "monumento"){ 
												$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
												$icon = '<i class="fa-solid fa-monument"></i>';
											}
											if($favorito["tipo_actividad"] == "evento") {
												$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
												$icon = "<i class='fa-regular fa-calendar-check'></i>";
											}
											?>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<a href="actividadPage.php?content=<?php echo ($favorito["tipo_actividad"]) ?>&id=<?php echo($favorito["id_actividad"]) ?>" style="text-decoration:none"><h6><?php echo($icon." ".$actividad->nombre()); ?></h6></a>
												<?php if(Usuario::is_favorito($_SESSION["idUsuario"], $favorito["tipo_actividad"], $favorito["id_actividad"])){ ?>
													<a href="../api/favoritos.php?from=contact&action=delete&id=<?php echo (Usuario::is_favorito($_SESSION["idUsuario"], $favorito["tipo_actividad"], $favorito["id_actividad"])) ?>&id_contacto=<?php echo($usuario["id"]) ?>" class="btn ms-1"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>
												<?php }else{?>
													<a href="../api/favoritos.php?from=contact&action=new&tipo=<?php echo ($favorito["tipo_actividad"]) ?>&id_actividad=<?php echo($favorito["id_actividad"]) ?>&id_contacto=<?php echo($usuario["id"]) ?>" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>
												<?php }?>
											</li>
										<?php } ?>
								<?php }else{
									echo("<p>No hay actividades favoritas.</p>");
								} ?>
							</ul>
						</div>
					</div>
					</div>
					<div class="col-sm-6 mb-3">
					<div class="card h-100">
						<div class="card-body">
							<h4 class="d-flex align-items-center mb-3"><i class="material-icons text-dark mr-2">Planes</i></h4>
							<ul class="list-group list-group-flush scroll">
							<?php
								$planesfavoritos = Usuario::get_planesfavoritos_by_id($usuario["id"]);
								if($planesfavoritos){?>
										<?php foreach($planesfavoritos as $planfavorito){
											
												$plan = Plan::get_plan_by_id($planfavorito["id_plan"]);
												$icon = "<i class='fa-solid fa-landmark'></i>";
											
											?>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<a href="actividadPage.php?content=plan&id=<?php echo($planfavorito["id_plan"]) ?>" style="text-decoration:none"><h6><?php echo($icon." ".$plan->nombre()); ?></h6></a>
												<?php if(Usuario::is_planfavorito($_SESSION["idUsuario"], $planfavorito["id_plan"])){ ?>
													<a href="../api/favoritos.php?from=contact&action=delete&plan=true&id=<?php echo (Usuario::is_planfavorito($_SESSION["idUsuario"], $planfavorito["id_plan"])) ?>&id_contacto=<?php echo($usuario["id"]) ?>" class="btn ms-1"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>
												<?php }else{?>
													<a href="../api/favoritos.php?from=contact&action=new&plan=true&id_plan=<?php echo($planfavorito["id_plan"]) ?>&id_contacto=<?php echo($usuario["id"]) ?>" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>
												<?php }?>
											</li>
										<?php } ?>
								<?php }else{
									echo("<p>No hay planes favoritas.</p>");
								} ?>
							</ul>
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