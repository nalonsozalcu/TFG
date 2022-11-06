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
			<h4>Tablas de datos</h4>
			<div class="btn-group">
			<a href="adminPage.php?content=admin&table=museos" class="btn btn-outline-secondary <?php if($active == 'museos') echo('active')?>">Museos</a>
			<a href="adminPage.php?content=admin&table=eventos" class="btn btn-outline-secondary <?php if($active == 'eventos') echo('active')?>">Eventos</a>
			<a href="adminPage.php?content=admin&table=monumentos" class="btn btn-outline-secondary <?php if($active == 'monumentos') echo('active')?>">Monumentos</a>
			<a href="adminPage.php?content=admin&table=restaurantes" class="btn btn-outline-secondary <?php if($active == 'restaurantes') echo('active')?>">Restaurantes</a>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
		<?php if($content){
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
		}else{
			require "admin/adminMuseos.php";
		}
		?>
		</div>
	</div>
</div>

