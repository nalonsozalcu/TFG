<?php require_once '../config.php';
require_once '../classes/Evento.php';
require_once '../classes/Restaurante.php';
require_once '../classes/Monumento.php';
require_once '../classes/Museo.php';?>

<!doctype html>
<html lang="en">

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
		<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="bd-placeholder-img" width="100%" height="100%" src="../assets/img/madrid1.jpg" alt="user" ria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
					<!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777" /></svg> -->
					<div class="container">
						<div class="carousel-caption text-start">
							<h1>Miles de actividades a tu disposición.</h1>
							<p>Echa un ojo a todas las actividades que puedes hacer en Madrid.</p>
							<p><a class="btn btn-lg btn-primary" href="actividadesPage.php">Ver actividades</a></p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img class="bd-placeholder-img" width="100%" height="100%" src="../assets/img/madrid2.jpg" alt="user" ria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
					<!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777" /></svg> -->
					<div class="container">
						<div class="carousel-caption">
							<h1>Te ofrecemos gran variedad de planes.</h1>
							<p>Visita los planes que tenemos y modificalos a tu gusto.</p>
							<p><a class="btn btn-lg btn-primary" href="planesPage.php">Ver planes</a></p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img class="bd-placeholder-img" width="100%" height="100%" src="../assets/img/madrid3.jpg" alt="user" ria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
					<!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777" /></svg> -->
					<div class="container">
						<div class="carousel-caption text-end">
							<h1>Crea planes a tu medida.</h1>
							<p>Genera tus propios planes en Madrid para pasar un día increible por la capital.</p>
							<p><a class="btn btn-lg btn-primary" href="planesPage.php?table=crear">Crear plan</a></p>
						</div>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Anterior</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Siguiente</span>
			</button>
		</div>


		<div class="container marketing">
			<?php
				$conn = Aplicacion::getConexionBD();
				$query = sprintf("SELECT * FROM `tendencias` WHERE `tipo_actividad` != 'planes'");
				$rs = $conn->query($query);
				$tendencias = $rs->fetch_all(MYSQLI_ASSOC);
			?>
			<div class="row">
				<?php
				$j = 0;
				while ($j < 3):
						$i = array_rand($tendencias);
						if($tendencias[$i]["tipo_actividad"] == "museos") {$tipo ="museo"; $actividad = Museo::get_museo_by_id($tendencias[$i]["id_actividad"]);}
						if($tendencias[$i]["tipo_actividad"] == "restaurantes") {$tipo ="restaurante"; $actividad = Restaurante::get_restaurante_by_id($tendencias[$i]["id_actividad"]);}
						if($tendencias[$i]["tipo_actividad"] == "monumentos") {$tipo ="monumento"; $actividad = Monumento::get_monumento_by_id($tendencias[$i]["id_actividad"]);}
						if($tendencias[$i]["tipo_actividad"] == "eventos") {$tipo ="evento"; $actividad = Evento::get_evento_by_id($tendencias[$i]["id_actividad"]);}
						?>
						<div class="col-lg-4">
							<img class="bd-placeholder-img rounded-circle" width="120" height="120" src="../assets/img/<?php echo($tipo."_icon.png") ?>" alt="icon" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
							<h3><?php echo($actividad->nombre()) ?></h3>
							<p><?php echo($actividad->direccion()) ?></p>
							<?php 
							if($actividad->get_global_valoracion($actividad->id())){
								for($e=1; $e < 6; $e++){
									if($e <= $actividad->get_global_valoracion($actividad->id())){
										echo('<i class="bi bi-star-fill text-warning ms-1"></i>');
									}else{
										echo('<i class="bi bi-star-fill ms-1"></i>');
									}
								}
							}?>
							<p><a class="btn btn-secondary mt-2" href="actividadPage.php?content=<?php echo($tipo) ?>&id=<?php echo($actividad->id()) ?>">Ver detalles &raquo;</a></p>
						</div>
				<?php
					$j++;
				endwhile;
				?>
			</div>
		</div>
	</main>

	<!-- PIE DE PÁGINA -->
	<?php
	require_once "../includes/footer.php";
	?>

</body>
</html>