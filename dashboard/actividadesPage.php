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
	
	<?php 
	if(isset($_GET["table"])){
		$content = true;
		$active =  $_GET["table"];
	}else{
		$content= false;
		$active ="";
	}
	
	?>
	<div class="vh-80 d-flex justify-content-center align-items-center">
		<div class="container">
			<div class="row d-flex justify-content-left mt-5">
				<h4>Actividades</h4>
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><a href="actividadesPage.php" class="nav-link px-2 link-secondary">Todas</a></li>
					<li><a href="#" class="nav-link px-2 link-dark">Tendencias</a></li>
					<li><a href="#" class="nav-link px-2 link-dark">Recomendadas</a></li>
				</ul>
			</div>
		<div class="row mt-3 mb-3 d-flex justify-content-start">
			<?php if(!$content){
			echo("<p>Selecciona un tipo de actividad:</p>");
			}
			?>
			<div class="btn-group">
			<a href="actividadesPage.php?table=museo" class="btn btn-outline-secondary <?php if($active == 'museo') echo('active')?>">Museos</a>
			<a href="actividadesPage.php?table=evento" class="btn btn-outline-secondary <?php if($active == 'evento') echo('active')?>">Eventos</a>
			<a href="actividadesPage.php?table=monumento" class="btn btn-outline-secondary <?php if($active == 'monumento') echo('active')?>">Monumentos</a>
			<a href="actividadesPage.php?table=restaurante" class="btn btn-outline-secondary <?php if($active == 'restaurante') echo('active')?>">Restaurantes</a>
			</div>
		
		</div>
		<div class="row d-flex justify-content-center">
		<?php 
	
			if($active == 'evento'){
				require "actividades/actividadesEventos.php";
			}
			if($active == 'monumento'){
				require "actividades/actividadesMonumentos.php";
			}
			if($active == 'restaurante'){
				require "actividades/actividadesRestaurantes.php";
			}
			if($active == 'museo'){
				require "actividades/actividadesMuseos.php";
			}
		?>
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