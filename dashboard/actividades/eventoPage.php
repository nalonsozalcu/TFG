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
				<p class="text-muted mb-1">Valoración: </p>
					<i class="bi bi-star-fill text-warning ms-1"></i>
					<i class="bi bi-star-fill text-warning ms-1"></i>
					<i class="bi bi-star-fill text-warning ms-1"></i>
					<i class="bi bi-star-fill ms-1"></i>
					<i class="bi bi-star-fill ms-1"></i>
				<div class="d-flex justify-content-end mt-2 mb-2">
				<a href="../api/favoritos.php?action=new&tipo=evento&id_actividad=<?php echo($evento->id()) ?>" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>
				<a href="../api/favoritos.php?action=new&tipo=evento&id_actividad=<?php echo($evento->id()) ?>" class="btn ms-1"><i class="fa-solid fa-share"></i></a>
				</div>
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
					<i class="bi bi-star-fill text-warning"></i>
					<p class="mb-0 ms-2">Valorar:</p>
					<div class="form ms-2" style="width: 4rem;">
						<input min="0" max="5" type="number" id="typeNumber" class="form-control" />
					</div>
					<button type="button" class="btn ms-2">Enviar</button>
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