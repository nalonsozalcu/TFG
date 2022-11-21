<?php require_once '../config.php';?>

<!DOCTYPE html>
<?php
	require_once "../includes/head.html";
	if(isset($_GET["content"])){
		$active =  $_GET["content"];
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
		?>
	</main>

</body>
</html>