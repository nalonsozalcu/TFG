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
			<a href="adminPage.php" class="btn btn-outline-secondary <?php if(!$content == 'users') echo('active')?>">Ususarios</a>
			<a href="adminPage.php?table=museos" class="btn btn-outline-secondary <?php if($active == 'museos') echo('active')?>">Museos</a>
			<a href="adminPage.php?table=eventos" class="btn btn-outline-secondary <?php if($active == 'eventos') echo('active')?>">Eventos</a>
			<a href="adminPage.php?table=monumentos" class="btn btn-outline-secondary <?php if($active == 'monumentos') echo('active')?>">Monumentos</a>
			<a href="adminPage.php?table=restaurantes" class="btn btn-outline-secondary <?php if($active == 'restaurantes') echo('active')?>">Restaurantes</a>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
		<?php if($content){
			if($active == 'eventos'){
				require "tables/eventosTable.php";
			}
			if($active == 'museos'){
				require "tables/museosTable.php";
			}
			if($active == 'monumentos'){
				require "tables/monumentosTable.php";
			}
			if($active == 'restaurantes'){
				require "tables/restaurantesTable.php";
			}
		}else{
			require "tables/usersTable.php";
		}
	?>
		</div>
	</div>
</div>