<!DOCTYPE html>
<?php if(isset($_GET["content"])){
	$content = true;
	$active =  $_GET["content"];
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
			<a href="adminPage.php?content=adminMuseo" class="btn btn-outline-secondary <?php if($active == 'museos') echo('active')?>">Museos</a>
			<a href="adminPage.php?content=adminEvento" class="btn btn-outline-secondary <?php if($active == 'eventos') echo('active')?>">Eventos</a>
			<a href="adminPage.php?content=adminMonumento" class="btn btn-outline-secondary <?php if($active == 'monumentos') echo('active')?>">Monumentos</a>
			<a href="adminPage.php?content=adminRestaurante" class="btn btn-outline-secondary <?php if($active == 'restaurantes') echo('active')?>">Restaurantes</a>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
		<?php if($content){
			if($active == 'adminMuseo'){
				require "admin/adminMuseos.php";
			}
			if($active == 'adminMonumento'){
				require "admin/adminMonumentos.php";
			}
			if($active == 'adminEvento'){
				require "admin/adminEventos.php";
			}
			if($active == 'adminRestaurante'){
				require "admin/adminRestaurantes.php";
			}
		}else{
			require "admin/adminMuseos.php";
		}
		?>
		</div>
	</div>
</div>

