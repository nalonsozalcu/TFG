<!DOCTYPE html>
<?php 
if(isset($_GET["table"])){
	$content = true;
	$active =  $_GET["table"];
}else{
	$content= false;
	$active ="";
}
if(isset($_GET["form"])){
	$form =  $_GET["form"];
}else{
	$form ="";
}
?>
<div class="vh-80 d-flex justify-content-center align-items-center">
	<div class="container">
		<div class="row mt-3 mb-3 d-flex justify-content-start">
			<h4>Tablas de datos</h4>
			<?php if(!$content){
				echo("<p>Selecciona una :</p>");
			}
			?>
			<div class="btn-group">
			<a href="adminPage.php?content=admin&table=museos" class="btn btn-outline-secondary <?php if($active == 'museos') echo('active')?>">Museos</a>
			<a href="adminPage.php?content=admin&table=eventos" class="btn btn-outline-secondary <?php if($active == 'eventos') echo('active')?>">Eventos</a>
			<a href="adminPage.php?content=admin&table=monumentos" class="btn btn-outline-secondary <?php if($active == 'monumentos') echo('active')?>">Monumentos</a>
			<a href="adminPage.php?content=admin&table=restaurantes" class="btn btn-outline-secondary <?php if($active == 'restaurantes') echo('active')?>">Restaurantes</a>
			<a href="adminPage.php?content=admin&table=planes" class="btn btn-outline-secondary <?php if($active == 'planes') echo('active')?>">Planes</a>
			</div>
			<div class='row mt-4 me-5 justify-content-end'>
				<?php 
				if(isset($_GET['upload'])){
					if($_GET['upload'] == "true")
						echo '<div class="w-25 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha modificado correctamente la actividad de ' . $active . '
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
					else
						echo '<div class="w-25 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No se ha modificado la actividad de ' . $active . '
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
				}
				if(isset($_GET['delete'])){
					if($_GET['delete'] == "true")
						echo '<div class="w-25 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha eliminado correctamente la actividad de ' . $active . '
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
					else
						echo '<div class="w-25 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No se ha eliminado la actividad de ' . $active . '
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
				}
				?>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
		<?php 
			if($active == 'museos'){
				require "admin/adminMuseos.php";
			}
			if($active == 'eventos'){
				require "admin/adminEventos.php";
			}
			if($active == 'monumentos'){
				require "admin/adminMonumentos.php";

			}
			if($active == 'restaurantes'){
				require "admin/adminRestaurantes.php";
			}
			if($active == 'planes'){
				require "admin/adminPlanes.php";
			}
			if($form == 'museos'){
				require "forms/museosForm.php";
			}
			if($form == 'eventos'){
				require "forms/eventosForm.php";
			}
			if($form == 'monumentos'){
				require "forms/monumentosForm.php";

			}
			if($form == 'restaurantes'){
				require "forms/restaurantesForm.php";
			}
			if($form == 'planes'){
				require "forms/planesForm.php";
			}
		?>
		</div>
	</div>
</div>

