<!DOCTYPE html>
<?php if(isset($_GET["table"])){
	$content = true;
	$active =  $_GET["table"];
}else{
	$content = false;
	$active ="";
}
?>
<div class="vh-80 d-flex justify-content-center align-items-center">
	<div class="container">
		<div class="row mt-3 mb-3 d-flex justify-content-start">
			<h4>Subir datos</h4>
			<?php if(!$content){
				echo("<p>Selecciona un tipo de actividad:</p>");
			}
			?>
			<div class="btn-group">
			<a href="adminPage.php?content=up_indiv&table=museos" class="btn btn-outline-secondary <?php if($active == 'museos') echo('active')?>">Museos</a>
			<a href="adminPage.php?content=up_indiv&table=eventos" class="btn btn-outline-secondary <?php if($active == 'eventos') echo('active')?>">Eventos</a>
			<a href="adminPage.php?content=up_indiv&table=monumentos" class="btn btn-outline-secondary <?php if($active == 'monumentos') echo('active')?>">Monumentos</a>
			<a href="adminPage.php?content=up_indiv&table=restaurantes" class="btn btn-outline-secondary <?php if($active == 'restaurantes') echo('active')?>">Restaurantes</a>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
		<?php if($content){
			if($active == 'eventos'){
				require "forms/eventosForm.php";
			}
			if($active == 'museos'){
				require "forms/museosForm.php";
			}
			if($active == 'monumentos'){
				require "forms/monumentosForm.php";
			}
			if($active == 'restaurantes'){
				require "forms/restaurantesForm.php";
			}
		}
		?>
		</div>
	</div>
</div>