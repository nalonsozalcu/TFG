<?php
    require_once '../classes/Evento.php';
	if(isset($_GET["id"])){
		$id =  $_GET["id"];
		$evento = Evento::get_evento_by_id($id);
	}
?>
<section style="background-color: #eee;">
	<div class="container py-5">
		<div class="row">
		<div class="col-lg-4">
			<div class="card mb-4">
			<div class="card-body text-center">
				<img src="../assets/img/evento_icon.png" alt="icon"
				class="rounded-circle img-fluid" style="width: 150px;">
				<h5 class="my-3"><?php echo($evento->nombre()) ?></h5>
				<p class="text-muted mb-1">Desde: <?php echo($evento->fecha_ini()) ?> Hasta: <?php echo($evento->fecha_fin()) ?></p>
				<p class="text-muted mb-4">Precio: <?php echo($evento->gratis()?"Gratuito":$evento->precio())?></p>
				<p class="mb-1">Valoración: <?php if($evento->get_global_valoracion($evento->id())) echo($evento->get_global_valoracion($evento->id())."  (".$evento->num_valoraciones($evento->id()).")")?></p>
				<?php 
				if($evento->get_global_valoracion($evento->id()))
					for($i=1; $i < 6; $i++){
						if($i <= $evento->get_global_valoracion($evento->id())){
							echo('<i class="bi bi-star-fill text-warning ms-1"></i>');
						}else{
							echo('<i class="bi bi-star-fill ms-1"></i>');
						}
					}
				?>
				<?php if(isset($_SESSION["idUsuario"])){
					$contactos = Usuario::get_user_contactos_by_id($_SESSION["idUsuario"]);?>
				<div class="d-flex justify-content-end mt-2 mb-2">
					<?php if(Usuario::is_favorito($_SESSION["idUsuario"], "evento", $evento->id())){ ?>
						<a href="../api/favoritos.php?from=ind&action=delete&id=<?php echo (Usuario::is_favorito($_SESSION["idUsuario"], "evento", $evento->id())) ?>&tipo=evento&id_actividad=<?php echo($evento->id()) ?>" class="btn ms-1"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>
					<?php }else{?>
						<a href="../api/favoritos.php?from=ind&action=new&tipo=evento&id_actividad=<?php echo($evento->id()) ?>" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>
					<?php }?>
					<?php if($contactos){?>
						<button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseshare" aria-expanded="false" aria-controls="collapseshare">
							<i class="fa-solid fa-share"></i>
						</button>
					<?php }?>
				</div>
				<div class="collapse <?php echo(isset($_GET["send"])?'show':'') ?>" id="collapseshare">
					<div class="card card-body">
						<h5 class="modal-title mb-3" id="shareModalLabel">Recomendar</h5>
						<ul class="list-group list-group-flush">
							<?php foreach($contactos as $user){?>
								<li class="list-group-item">
									<div class="row justify-content-between">
										<div class="col-8">
											<div class="row justify-content-start">
												<div class="col-4">
													<img class="rounded-circle" width="30px" src="../files/users/<?php echo($user["username"]) ?>/<?php echo($user["avatar"]) ?>" alt="user">
												</div>
												<div class="col-8 ms-0 align-self-end">
													<h6 class="mb-0"><?php echo($user["username"]) ?></h6>
												</div>
											</div>
										</div>
										<div class="col-3 align-self-center">
										<?php if(!Usuario::recomendacion_sended($user["id"], $_SESSION["idUsuario"], "evento", $evento->id())){?>
											<a href="../api/recomendaciones.php?action=send&tipo=evento&id_actividad=<?php echo($evento->id()) ?>&id_contacto=<?php echo($user["id"]) ?>" class="btn"><i class="bi bi-send-fill text-primary"></i></a>
										<?php } else{?>
												<p class="text-success mb-0">Enviado!</p>
										<?php }?>
										</div>
									</div>
								</li>
						<?php }?>
						</ul>
					</div>
				</div>
				<?php }?>
			</div>
			</div>
			<div class="card mb-4 mb-lg-0">
			<div class="card-body p-0">
				<ul class="list-group list-group-flush rounded-3">
				<li class="list-group-item d-flex justify-content-start align-items-center p-3">
					<i class="fas fa-globe fa-lg text-primary"></i>
					<p class="ms-3 mb-0"><a href=<?php echo($evento->url()) ?> class="link" target="_blank">Link a la web</a></p>
				</li>
				<li class="list-group-item d-flex justify-content-start align-items-center p-3">
					<i class="bi bi-geo-alt-fill"></i>
					<p class="ms-3 mb-0"><?php echo($evento->direccion()." ".$evento->codpostal()) ?></p>
				</li>
                <li class="list-group-item d-flex justify-content-start align-items-center p-3">
                    <i class="bi bi-calendar-check"></i>
					<p class="ms-3 mb-0">Días de la semana: <?php echo($evento->dias()!=""?$evento->dias():"No disponible.") ?></p>
				</li>
                <li class="list-group-item d-flex justify-content-start align-items-center p-3">
                    <i class="bi bi-calendar-x"></i>
					<p class="ms-3 mb-0">Días excluidos: <?php echo($evento->dias_ex()!=""?$evento->dias_ex():"No disponible.") ?></p>
				</li>
                <li class="list-group-item d-flex justify-content-start align-items-center p-3">
                    <i class="bi bi-clock"></i>
					<p class="ms-3 mb-0">Hora: <?php echo($evento->hora()!=""?$evento->hora():"No disponible.") ?></p>
				</li>
				<li class="list-group-item d-flex justify-content-start align-items-center p-3">
					<?php if($evento->is_valoracion($evento->id(), $_SESSION["idUsuario"])){?>
						<p class="mb-0 me-2">Tu valoración: <?php echo($evento->get_valoracion($evento->is_valoracion($evento->id(), $_SESSION["idUsuario"])))?></p>
						<i class="bi bi-star-fill text-warning ms-1"></i>
						<a href="../api/valoracion.php?action=delete&tipo=evento&id_actividad=<?php echo($evento->id()) ?>&id=<?php echo($evento->is_valoracion($evento->id(), $_SESSION["idUsuario"])) ?>"><i class="bi bi-trash3 ms-3" style="color: red;"></i></a>
					<?php }else{ ?>
						<i class="bi bi-star-fill text-warning"></i>
						<p class="mb-0 ms-2">Valorar:</p>
						<form method="POST" action="../api/valoracion.php?action=new&tipo=evento&id_actividad=<?php echo($evento->id()) ?>">
							<div class="row ms-2">
								<div class="col-6">
								<input min="0" max="5" type="number" id="valoracion" name="valoracion" value="0" class="form-control" />
							</div>
								<button type="submit" class="btn col-6">Enviar</button>
							</div>
						</form>
					<?php } ?>
				</li>
				</ul>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card mb-4">
			<div class="card-body">
                <div class="row">
					<div class="col">
						<h5 class="mb-2">Lugar: <?php echo($evento->lugar()!=""?$evento->lugar():"No disponible.") ?></h5>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<h5 class="mb-2">Descripción:</h5>
						<p class="text-muted mb-0"><?php echo($evento->descripcion()!=""?$evento->descripcion():"No disponible.") ?></p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<h5 class="mb-2">Ubicación:</h5>
					<?php if($evento->longitud() != "" && $evento->latitud() != ""){
							$longitud = str_replace ( ".", '', $evento->longitud());
							$prefix = substr($longitud, 0, 2);
							$subfix = substr($longitud, 2, 12);
							$longitud = $prefix.".".$subfix;
							$latitud = str_replace ( ".", '', $evento->latitud());
							$prefix = substr($latitud, 0, 2);
							$subfix = substr($latitud, 2, 10);
							$latitud = $prefix.".".$subfix;?>
							<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2055.4280999275275!2d<?php echo($longitud) ?>!3d<?php echo($latitud) ?>!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1668630382615!5m2!1ses!2ses" width="820" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						<?php }else{
								echo("No disponible.");
							}?>
					</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</section>