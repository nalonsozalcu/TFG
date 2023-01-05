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
				class="img-fluid" style="width: 80px;">
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
						<p class="mb-0 me-1">Descargar PDF:</p>
						<button type="button" id="button_download" class="btn"><i class="fas fa-cloud-download-alt" style="color: blue;"></i></button>
					</li>
					<li class="list-group-item d-flex justify-content-start align-items-center p-3">
						<p class="mb-0 me-3">Modificar:</p>
						<a href="actividadPage.php?content=plan&edit=true&id=<?php echo($plan->id()) ?>"><i class="bi bi-pencil-square" style="color: orange;"></i></a>
					</li>
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
				<?php if(isset($_GET["edit"])){ 
						require "admin/forms/planesForm.php";
				} else { ?>
				<div class="row">
					<div class="col">
						<h5 class="mb-2">Descripción:</h5>
						<p class="text-muted mb-0"><?php echo($plan->descripcion() != ""? $plan->descripcion(): "No disponible.") ?></p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<h5 class="mb-2">Timeline:</h5>
					</div>
					<div class="container">
						<div class="main-timeline">
							<!-- start experience section-->
							<?php 
							if($plan->id_act_1() != 0){
								if($plan->tipo_act_1() == "Museo") {
									$icon = "<i class='fa-solid fa-landmark'></i>";
									$actividad1 = Museo::get_museo_by_id($plan->id_act_1());}
								if($plan->tipo_act_1() == "Restaurante") {
									$icon = '<i class="fa-solid fa-utensils"></i>';
									$actividad1 = Restaurante::get_restaurante_by_id($plan->id_act_1());}
								if($plan->tipo_act_1() == "Evento"){ 
									$icon = "<i class='fa-regular fa-calendar-check'></i>";
									$actividad1 = Evento::get_evento_by_id($plan->id_act_1());}
								if($plan->tipo_act_1() == "Monumento") {
									$icon = '<i class="fa-solid fa-monument"></i>';
									$actividad1 = Monumento::get_monumento_by_id($plan->id_act_1());}
							?>
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"><?php echo($plan->tipo_act_1()) ?></span>
										<span class="year"><?php echo($plan->hora_act_1()) ?></span>
										</span>
									</div>
								</div>
								<div class="timeline-content">
									<h5 class="title"><a href="actividadPage.php?content=<?php echo(strtolower($plan->tipo_act_1())) ?>&id=<?php echo($actividad1->id()) ?>" style="text-decoration:none"><?php echo($icon." ".$actividad1->nombre()) ?></a></h5>
									<p class="description">
									<?php echo($actividad1->direccion()) ?>
									</p>
								</div>
							</div>
							<?php } ?>
							<!-- end experience section-->

							<!-- start experience section-->
							<?php 
							if($plan->id_act_2() != 0){
								if($plan->tipo_act_2() == "Museo") {
									$icon = "<i class='fa-solid fa-landmark'></i>";
									$actividad2 = Museo::get_museo_by_id($plan->id_act_2());}
								if($plan->tipo_act_2() == "Restaurante") {
									$icon = '<i class="fa-solid fa-utensils"></i>';
									$actividad2 = Restaurante::get_restaurante_by_id($plan->id_act_2());}
								if($plan->tipo_act_2() == "Evento"){ 
									$icon = "<i class='fa-regular fa-calendar-check'></i>";
									$actividad2 = Evento::get_evento_by_id($plan->id_act_2());}
								if($plan->tipo_act_2() == "Monumento") {
									$icon = '<i class="fa-solid fa-monument"></i>';
									$actividad2 = Monumento::get_monumento_by_id($plan->id_act_2());}
							?>
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"><?php echo($plan->tipo_act_2()) ?></span>
										<span class="year"><?php echo($plan->hora_act_2()) ?></span>
										</span>
									</div>
								</div>
								<div class="timeline-content">
									<h5 class="title"><a href="actividadPage.php?content=<?php echo(strtolower($plan->tipo_act_2())) ?>&id=<?php echo($actividad2->id()) ?>" style="text-decoration:none"><?php echo($icon." ".$actividad2->nombre()) ?></a></h5>
									<p class="description">
									<?php echo($actividad2->direccion()) ?>
									</p>
								</div>
							</div>
							<?php } ?>
							<!-- end experience section-->

							<!-- start experience section-->
							<?php 
							if($plan->id_act_3() != 0){
								if($plan->tipo_act_3() == "Museo") {
									$icon = "<i class='fa-solid fa-landmark'></i>";
									$actividad3 = Museo::get_museo_by_id($plan->id_act_3());}
								if($plan->tipo_act_3() == "Restaurante") {
									$icon = '<i class="fa-solid fa-utensils"></i>';
									$actividad3 = Restaurante::get_restaurante_by_id($plan->id_act_3());}
								if($plan->tipo_act_3() == "Evento"){ 
									$icon = "<i class='fa-regular fa-calendar-check'></i>";
									$actividad3 = Evento::get_evento_by_id($plan->id_act_3());}
								if($plan->tipo_act_3() == "Monumento") {
									$icon = '<i class="fa-solid fa-monument"></i>';
									$actividad3 = Monumento::get_monumento_by_id($plan->id_act_3());}
							?>
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"><?php echo($plan->tipo_act_3()) ?></span>
										<span class="year"><?php echo($plan->hora_act_3()) ?></span>
										</span>
									</div>
								</div>
								<div class="timeline-content">
									<h5 class="title"><a href="actividadPage.php?content=<?php echo(strtolower($plan->tipo_act_3())) ?>&id=<?php echo($actividad3->id()) ?>" style="text-decoration:none"><?php echo($icon." ".$actividad3->nombre()) ?></a></h5>
									<p class="description">
									<?php echo($actividad3->direccion()) ?>
									</p>
								</div>
							</div>
							<?php } ?>
							<!-- end experience section-->

							<!-- start experience section-->
							<?php 
							if($plan->id_act_4() != 0){
								if($plan->tipo_act_4() == "Museo") {
									$icon = "<i class='fa-solid fa-landmark'></i>";
									$actividad4 = Museo::get_museo_by_id($plan->id_act_4());}
								if($plan->tipo_act_4() == "Restaurante") {
									$icon = '<i class="fa-solid fa-utensils"></i>';
									$actividad4 = Restaurante::get_restaurante_by_id($plan->id_act_4());}
								if($plan->tipo_act_4() == "Evento"){ 
									$icon = "<i class='fa-regular fa-calendar-check'></i>";
									$actividad4 = Evento::get_evento_by_id($plan->id_act_4());}
								if($plan->tipo_act_4() == "Monumento") {
									$icon = '<i class="fa-solid fa-monument"></i>';
									$actividad4 = Monumento::get_monumento_by_id($plan->id_act_4());}
							?>
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"><?php echo($plan->tipo_act_4()) ?></span>
										<span class="year"><?php echo($plan->hora_act_4()) ?></span>
										</span>
									</div>
								</div>
								<div class="timeline-content">
									<h5 class="title"><a href="actividadPage.php?content=<?php echo(strtolower($plan->tipo_act_4())) ?>&id=<?php echo($actividad4->id()) ?>" style="text-decoration:none"><?php echo($icon." ".$actividad4->nombre()) ?></a></h5>
									<p class="description">
									<?php echo($actividad4->direccion()) ?>
									</p>
								</div>
							</div>
							<?php } ?>
							<!-- end experience section-->

							<!-- start experience section-->
							<?php 
							if($plan->id_act_5() != 0){
								if($plan->tipo_act_5() == "Museo") {
									$icon = "<i class='fa-solid fa-landmark'></i>";
									$actividad5 = Museo::get_museo_by_id($plan->id_act_5());}
								if($plan->tipo_act_5() == "Restaurante") {
									$icon = '<i class="fa-solid fa-utensils"></i>';
									$actividad5 = Restaurante::get_restaurante_by_id($plan->id_act_5());}
								if($plan->tipo_act_5() == "Evento"){ 
									$icon = "<i class='fa-regular fa-calendar-check'></i>";
									$actividad5 = Evento::get_evento_by_id($plan->id_act_5());}
								if($plan->tipo_act_5() == "Monumento") {
									$icon = '<i class="fa-solid fa-monument"></i>';
									$actividad5 = Monumento::get_monumento_by_id($plan->id_act_5());}
							?>
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"><?php echo($plan->tipo_act_5()) ?></span>
										<span class="year"><?php echo($plan->hora_act_5()) ?></span>
										</span>
									</div>
								</div>
								<div class="timeline-content">
									<h5 class="title"><a href="actividadPage.php?content=<?php echo(strtolower($plan->tipo_act_5())) ?>&id=<?php echo($actividad5->id()) ?>" style="text-decoration:none"><?php echo($icon." ".$actividad5->nombre()) ?></a></h5>
									<p class="description">
									<?php echo($actividad5->direccion()) ?>
									</p>
								</div>
							</div>
							<?php } ?>
							<!-- end experience section-->

						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			</div>
		</div>
		</div>
	</div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

<script type="text/javascript">

	var button = document.getElementById("button_download");
	button.addEventListener("click", function() {
		createPDF();
	});

	function createPDF(){
		var doc = new jsPDF();
		/// Codigo para agregar una imagen
		var logo = new Image();
		logo.src = '../assets/img/brand_blue.jpeg';
		var icon = new Image();
		icon.src = '../assets/img/plan.png';
		doc.addImage(logo,75,10,60,20);
		// Inicio texto
		var z = 20;
		var x = 28;
		var y = 40;

		doc.addImage(icon,z,y -5,5,5)
		doc.setFontSize(14);
		doc.setTextColor(100);
		doc.text(z + 8, y, 'Actividad 1:');
		doc.setFontSize(12);
		doc.setTextColor(0, 0, 0);
		doc.text(z + 36, y, "<?php echo ($plan->tipo_act_1()); ?>");
		doc.setTextColor(100);
		doc.text(x, y+10, 'Nombre:');
		doc.text(x, y+20, 'Hora:');
		doc.text(x, y+30, 'Lugar:');
		doc.setTextColor(0, 0, 0);
		doc.text(x+18, y+10, "<?php echo ($actividad1->nombre()); ?>");
		doc.text(x+15, y+20, "<?php echo ($plan->hora_act_1()); ?>");
		doc.text(x+15, y+30, "<?php echo ($actividad1->direccion()); ?>");
		// ------------------------------ //
		<?php if($plan->id_act_2() != 0){ ?>
			doc.rect(z, y+35, 170, 0);
			var y = 85;
			doc.addImage(icon,z,y -5,5,5)
			doc.setFontSize(14);
			doc.setTextColor(100);
			doc.text(z + 8, y, 'Actividad 2:');
			doc.setFontSize(12);
			doc.setTextColor(0, 0, 0);
			doc.text(z + 36, y, "<?php echo ($plan->tipo_act_2()); ?>");
			doc.setTextColor(100);
			doc.text(x, y+10, 'Nombre:');
			doc.text(x, y+20, 'Hora:');
			doc.text(x, y+30, 'Lugar:');
			doc.setTextColor(0, 0, 0);
			doc.text(x+18, y+10, "<?php echo ($actividad2->nombre()); ?>");
			doc.text(x+15, y+20, "<?php echo ($plan->hora_act_2()); ?>");
			doc.text(x+15, y+30, "<?php echo ($actividad2->direccion()); ?>");
		<?php } ?>
		// ------------------------------ //
		<?php if($plan->id_act_3() != 0){ ?>
			doc.rect(z, y+35, 170, 0);
			var y = 130;
			doc.addImage(icon,z,y -5,5,5)
			doc.setFontSize(14);
			doc.setTextColor(100);
			doc.text(z + 8, y, 'Actividad 3:');
			doc.setFontSize(12);
			doc.setTextColor(0, 0, 0);
			doc.text(z + 36, y, "<?php echo ($plan->tipo_act_3()); ?>");
			doc.setTextColor(100);
			doc.text(x, y+10, 'Nombre:');
			doc.text(x, y+20, 'Hora:');
			doc.text(x, y+30, 'Lugar:');
			doc.setTextColor(0, 0, 0);
			doc.text(x+18, y+10, "<?php echo ($actividad3->nombre()); ?>");
			doc.text(x+15, y+20, "<?php echo ($plan->hora_act_3()); ?>");
			doc.text(x+15, y+30, "<?php echo ($actividad3->direccion()); ?>");
		<?php } ?>
	
		// ------------------------------ //
		<?php if($plan->id_act_4() != 0){ ?>

			doc.rect(z, y+35, 170, 0);
			var y = 175;
			doc.addImage(icon,z,y -5,5,5)
			doc.setFontSize(14);
			doc.setTextColor(100);
			doc.text(z + 8, y, 'Actividad 4:');
			doc.setFontSize(12);
			doc.setTextColor(0, 0, 0);
			doc.text(z + 36, y, "<?php echo ($plan->tipo_act_4()); ?>");
			doc.setTextColor(100);
			doc.text(x, y+10, 'Nombre:');
			doc.text(x, y+20, 'Hora:');
			doc.text(x, y+30, 'Lugar:');
			doc.setTextColor(0, 0, 0);
			doc.text(x+18, y+10, "<?php echo ($actividad4->nombre()); ?>");
			doc.text(x+15, y+20, "<?php echo ($plan->hora_act_4()); ?>");
			doc.text(x+15, y+30, "<?php echo ($actividad4->direccion()); ?>");
		<?php } ?>

		// ------------------------------ //
		<?php if($plan->id_act_5() != 0){ ?>

			doc.rect(z, y+35, 170, 0);
			var y = 220;
			doc.addImage(icon,z,y -5,5,5)
			doc.setFontSize(14);
			doc.setTextColor(100);
			doc.text(z + 8, y, 'Actividad 5:');
			doc.setFontSize(12);
			doc.setTextColor(0, 0, 0);
			doc.text(z + 36, y, "<?php echo ($plan->tipo_act_5()); ?>");
			doc.setTextColor(100);
			doc.text(x, y+10, 'Nombre:');
			doc.text(x, y+20, 'Hora:');
			doc.text(x, y+30, 'Lugar:');
			doc.setTextColor(0, 0, 0);
			doc.text(x+18, y+10, "<?php echo ($actividad5->nombre()); ?>");
			doc.text(x+15, y+20, "<?php echo ($plan->hora_act_5()); ?>");
			doc.text(x+15, y+30, "<?php echo ($actividad5->direccion()); ?>");

		<?php } ?>


		doc.text(180, 280, "<?php echo ($plan->fecha()); ?>");
		
		doc.save('Plan"<?php echo ($plan->nombre()); ?>".pdf');
	}

</script>