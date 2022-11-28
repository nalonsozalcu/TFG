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
			</div>
			<nav class="navbar navbar-expand">
				<ul class="navbar-nav mb-5">
					<li class="nav-item"><a href="actividadesPage.php" class="nav-link <?php if($content == false) echo('active')?>"><i class="bi bi-star"></i> Tendencias </i></a></li>
					<div class="vr"></div>
					<li class="nav-item"><a href="actividadesPage.php?table=museo" class="nav-link <?php if($active == 'museo') echo('active')?>"> Museos </a></li>
					<div class="vr"></div>
					<li class="nav-item"><a href="actividadesPage.php?table=evento" class="nav-link <?php if($active == 'evento') echo('active')?>"> Eventos </a></li>
					<div class="vr"></div>
					<li class="nav-item"><a href="actividadesPage.php?table=monumento" class="nav-link <?php if($active == 'monumento') echo('active')?>"> Monumentos </a></li>
					<div class="vr"></div>
					<li class="nav-item"><a href="actividadesPage.php?table=restaurante" class="nav-link <?php if($active == 'restaurante') echo('active')?>"> Restaurantes </a></li>
				</ul>
				<div class="row d-flex justify-content-center">
				<?php 
					if(!$content){
						require "actividades/actividadesTendencias.php";
					}
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
			</nav>
		</div>
	</div>


	</main>
</body>
</html>