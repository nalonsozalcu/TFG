<?php require_once '../config.php';
require_once '../classes/Plan.php';
require_once '../classes/Evento.php';
require_once '../classes/Restaurante.php';
require_once '../classes/Monumento.php';
require_once '../classes/Museo.php';
?>


<!DOCTYPE html>
<?php
	require_once "../includes/head.html";
	if(isset($_GET["content"])){
		$active =  $_GET["content"];
	}
	if(isset($_GET["id_plan"])){
		$id =  $_GET["id_plan"];
	}
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
			if($active == 'monumento'){
				require "actividades/monumentoPage.php";
			}
			if($active == 'museo'){
				require "actividades/museoPage.php";
			}
			if($active == 'restaurante'){
				require "actividades/restaurantePage.php";
			}
			if($active == 'evento'){
				require "actividades/eventoPage.php";
			}
			if($active == 'plan'){
				require "planes/planPage.php";
			}
		?>
	</main>

</body>
</html>