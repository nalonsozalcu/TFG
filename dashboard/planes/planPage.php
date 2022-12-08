<?php
    require_once '../classes/Plan.php';
	if(isset($_GET["id"])){
		$id =  $_GET["id"];
		$plan = Plan::get_plan_by_id($id);
	}
?>
<section style="background-color: #eee;">
	<div class="container py-5">
		<div class="row">
		<div class="col-lg-4">
			<div class="card mb-4">
			<div class="card-body text-center">
				<img src="../assets/img/plan_icon.png" alt="icon"
				class="img-fluid" style="width: 120px;">
				<h5 class="my-3"><?php echo($plan->nombre()) ?></h5>
				<p class="text-muted mb-1">Fecha: <?php echo($plan->fecha()) ?></p>
				<p class="mb-1">Valoración: <?php if($plan->get_global_valoracion($plan->id())) echo($plan->get_global_valoracion($plan->id())."  (".$plan->num_valoraciones($plan->id()).")")?></p>
				<?php 
				if($plan->get_global_valoracion($plan->id()))
					for($i=1; $i < 6; $i++){
						if($i <= $plan->get_global_valoracion($plan->id())){
							echo('<i class="bi bi-star-fill text-warning ms-1"></i>');
						}else{
							echo('<i class="bi bi-star-fill ms-1"></i>');
						}
					}
				?>
				<?php if(isset($_SESSION["idUsuario"])){
					$contactos = Usuario::get_user_contactos_by_id($_SESSION["idUsuario"]);?>
				<div class="d-flex justify-content-end mt-2 mb-2">
					<?php if(Usuario::is_planfavorito($_SESSION["idUsuario"], $plan->id())){ ?>
						<a href="../api/favoritos.php?from=ind&action=delete&plan=true&id=<?php echo (Usuario::is_planfavorito($_SESSION["idUsuario"], $plan->id())) ?>&id_plan=<?php echo($plan->id()) ?>" class="btn ms-1"><i class="bi bi-suit-heart-fill" style="color: red;"></i></a>
					<?php }else{?>
						<a href="../api/favoritos.php?from=ind&action=new&plan=true&id_plan=<?php echo($plan->id()) ?>" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>
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
										<?php if(!Usuario::recomendacion_sended($user["id"], $_SESSION["idUsuario"], "plan", $plan->id())){?>
											<a href="../api/recomendaciones.php?action=send&tipo=plan&id_actividad=<?php echo($plan->id()) ?>&id_contacto=<?php echo($user["id"]) ?>" class="btn"><i class="bi bi-send-fill text-primary"></i></a>
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
					<?php if(isset($_SESSION["idUsuario"])){ if($plan->is_valoracion($plan->id(), $_SESSION["idUsuario"])){?>
						<p class="mb-0 me-2">Tu valoración: <?php echo($plan->get_valoracion($plan->is_valoracion($plan->id(), $_SESSION["idUsuario"])))?></p>
						<i class="bi bi-star-fill text-warning ms-1"></i>
						<a href="../api/valoracion.php?action=delete&tipo=plan&id_plan=<?php echo($plan->id()) ?>&id=<?php echo($plan->is_valoracion($plan->id(), $_SESSION["idUsuario"])) ?>"><i class="bi bi-trash3 ms-3" style="color: red;"></i></a>
					<?php }else{ ?>
						<i class="bi bi-star-fill text-warning"></i>
						<p class="mb-0 ms-2">Valorar:</p>
						<form method="POST" action="../api/valoracion.php?action=new&tipo=plan&id_plan=<?php echo($plan->id()) ?>">
							<div class="row ms-2">
								<div class="col-6">
								<input min="0" max="5" type="number" id="valoracion" name="valoracion" value="0" class="form-control" />
							</div>
								<button type="submit" class="btn col-6">Enviar</button>
							</div>
						</form>
					<?php }} ?>
				</li>
				</ul>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card mb-4">
			<div class="card-body">
				<div class="row">
				</div>
				<hr>
				<div class="row">
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</section>