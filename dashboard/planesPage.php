<?php require_once '../config.php';
require_once '../classes/Plan.php';
require_once '../classes/Evento.php';
require_once '../classes/Restaurante.php';
require_once '../classes/Monumento.php';
require_once '../classes/Museo.php';
?>
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
				<h4>Planes</h4>
			</div>
			<nav class="navbar navbar-expand">
				<ul class="navbar-nav mb-5">
					<li class="nav-item"><a href="planesPage.php?table=tendencias" class="nav-link <?php if($content == false) echo('active')?>"><i class="bi bi-star"></i> Tendencias </i></a></li>
					<div class="vr"></div>
					<li class="nav-item"><a href="planesPage.php?table=plan" class="nav-link <?php if($active == 'plan') echo('active')?>"> Planes </a></li>
					<div class="vr"></div>
					<li class="nav-item"><a href="planesPage.php?table=crear" class="nav-link <?php if($active == 'crear') echo('active')?>"> Crear plan </a></li>
				</ul>
				<div class="row d-flex justify-content-center">
				<?php 
					if(!$content || $active == 'tendencias'){
						require "planes/planesTendencias.php";
					}
					if($active == 'plan'){
						require "planes/planes.php";
					}
					if($active == 'crear'){
						require "admin/forms/planesForm.php";
					}
				?>
				</div>
			</nav>
		</div>
	</div>


	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
</body>
</html>