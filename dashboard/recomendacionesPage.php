<?php require_once '../config.php';?>

<!DOCTYPE html>
<?php
	require_once "../includes/head.html";
    require_once '../classes/Evento.php';
    require_once '../classes/Museo.php';
    require_once '../classes/Restaurante.php';
    require_once '../classes/Monumento.php';
	
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
					<h3>Recomendaciones</h3>
				</div>
				<div class="row d-flex justify-content-center mt-4">
				<?php
					$recomendaciones = Usuario::get_recomendaciones_by_id($_SESSION["idUsuario"]);
					if($recomendaciones){?>
						<ul class="list-group list-group-flush">
							<?php foreach($recomendaciones as $recomendacion){
                                $user = Usuario::get_user_by_id($recomendacion["id_contacto"]);
                                if($recomendacion["tipo_actividad"] == "museo") $actividad = Museo::get_museo_by_id($recomendacion["id_actividad"]);
                                if($recomendacion["tipo_actividad"] == "restaurante") $actividad = Restaurante::get_restaurante_by_id($recomendacion["id_actividad"]);
                                if($recomendacion["tipo_actividad"] == "monumento") $actividad = Monumento::get_monumento_by_id($recomendacion["id_actividad"]);
                                if($recomendacion["tipo_actividad"] == "evento") $actividad = Evento::get_evento_by_id($recomendacion["id_actividad"]);
                                ?>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-3"><img width="100px" src="../assets/img/<?php echo($recomendacion["tipo_actividad"]."_icon.png") ?>" alt="icon"></div>
                                                    <div class="col align-self-center">
														<a href="actividadPage.php?content=<?php echo($recomendacion["tipo_actividad"]) ?>&id=<?php echo($actividad->id()) ?>"><h6><?php echo($actividad->nombre()) ?></h6></a>
														<p><?php echo($actividad->direccion()) ?></p>
														<div class="row"><div class="col">
															<i class="bi bi-star-fill text-warning ms-1"></i>
															<i class="bi bi-star-fill text-warning ms-1"></i>
															<i class="bi bi-star-fill text-warning ms-1"></i>
															<i class="bi bi-star-fill ms-1"></i>
															<i class="bi bi-star-fill ms-1"></i>
														</div></div>
													</div>
                                                </div>
											</div>
											<div class="col-md-3 align-self-end">
												<p class="mb-0">Recomendado por: <?php echo($user["username"]) ?></p>
											</div>
											<div class="col-md-3 align-self-end">
												<a href="../api/recomendaciones.php?action=acept&id=<?php echo($recomendacion["id"]) ?>&tipo=<?php echo($recomendacion["tipo_actividad"]) ?>&id_actividad=<?php echo($recomendacion["id_actividad"]) ?>" class="btn btn-danger pull-right"><i class="bi bi-suit-heart-fill"></i></a>
												<a href="../api/recomendaciones.php?action=discard&id=<?php echo($recomendacion["id"]) ?>" class="btn btn-secondary pull-right">X</i></a>
											</div>
										</div>
									</li>
									<br>
							<?php } ?>
						</ul>
				<?php }else{
					echo("<p>No hay recomendaciones nuevas.</p>");
				} ?>
				</div>
			</div>
		</div>
	</main>

</body>
</html>