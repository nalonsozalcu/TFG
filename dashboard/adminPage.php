<?php require_once '../config.php';?>

<!DOCTYPE html>
<?php
	require_once "../includes/head.html";
?>

<body>
	<!-- ENCABEZADO -->
	<?php
	require_once "../includes/header.php";
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<?php if(isset($_GET["content"])){
		$content = true;
		$active =  $_GET["content"];
	}else{
		$content = false;
		$active ="";
	}
	?>

	<!-- CUERPO -->
	<!-- Here is our page's main content -->
	<main>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2">
				<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f7f6fb;">
					<a class="navbar-brand mb-3" href="#">Administrador</a>
					<ul class="row navbar-nav mr-auto">
						<div class="col-12 d-flex ms-5">
							<li class="nav-item">
								<a class="nav-link <?php if(!$content) echo('active')?>" href="adminPage.php"><i class="bi bi-house"></i><span class="nav_name">  Home</span></a>
							</li>
						</div>
						<div class="col-12 d-flex ms-5">
							<li class="nav-item">
								<a class="nav-link <?php if($active == 'users') echo('active')?>" href="adminPage.php?content=users"><i class="bi bi-people"></i><span class="nav_name">  Users</span></a>
							</li>
						</div>
						<div class="col-12 d-flex ms-5">
							<li class="nav-item">
								<a class="nav-link <?php echo(($active == 'up_indiv' || $active == 'up_massive' || $active == 'admin')? 'active' : '');?>" data-bs-toggle="collapse"  href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample"><i class="bi bi-bar-chart"></i><span class="nav_name">  Data</span></a>
								
							</li>
						</div>
							<div class="collapse <?php echo(($active == 'up_indiv' || $active == 'up_massive' || $active == 'admin')? 'show' : '');?>" id="collapseExample">
								<div class="col-12 d-flex ms-5"><li class="nav-item"><a class="nav-link <?php if($active == 'up_indiv') echo('active')?>" href="adminPage.php?content=up_indiv"><i class="bi bi-cloud-arrow-up"></i><span class="nav_name">  Upload individual data</span></a></li></div>
								<div class="col-12 d-flex ms-5">	<li class="nav-item"><a class="nav-link <?php if($active == 'up_massive') echo('active')?>" href="adminPage.php?content=up_massive"><i class="bi bi-cloud-arrow-up-fill"></i><span class="nav_name">  Upload massive data</span></a></li></div>
								<div class="col-12 d-flex ms-5">	<li class="nav-item"><a class="nav-link <?php if($active == 'admin') echo('active')?>" href="adminPage.php?content=admin"><i class="bi bi-clipboard-data"></i><span class="nav_name">  Admin data</span></a></li></div>
							</div>
						
					</ul>
				</nav>
			</div>
			<div class="col-10">
				<?php if($content){
						if($active == 'users'){
							require "admin/adminUsers.php";
						}
						if($active == 'up_indiv'){
							require "admin/uploadIndividualData.php";
						}
						if($active == 'up_massive'){
							require "admin/uploadMassiveData.php";
						}
						if($active == 'admin'){
							require "admin/adminData.php";
						}
					}else{
						require "admin/adminTables.php";
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
	<?php
	require_once "../includes/tables.html";
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
	<script>
		$(document).ready(function() {
			var table = $('#example').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
			} );
		
			table.buttons().container()
				.appendTo( '#example_wrapper .col-md-6:eq(0)' );
		} );
	</script>
</body>
</html>