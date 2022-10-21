<!DOCTYPE html>
<div class="vh-80 d-flex justify-content-center align-items-center">
	<div class="container">
		<div class="row mt-3 mb-3 d-flex justify-content-start">
			<h4>Administrador de usuarios</h4>
		</div>
		<div class="row d-flex justify-content-end">
		<?php
			if(isset($_GET['ok'])){
				if($_GET['ok'] == "true")
					echo '<div class="w-25 p-3 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha eliminado correctamente el usuario
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
				else
					echo '<div class="w-25 p-3 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No se ha eliminado el usuario
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
		?>
		</div>
		<div class="row d-flex justify-content-center">
			<table id="example" class="table table-striped" style="width:100%">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Full name</th>
					<th scope="col">Role</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th scope="col">User ID</th>
					<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$users = Usuario::get_all_users();
					foreach ($users as $i => $value) {
						echo('<tr>');
						echo('<th scope="row">'.($i + 1).'</th>');
						echo('<td><img src="../assets/img/'.$users[$i]["avatar"].'" width="32" height="32" class="rounded-circle"> '.$users[$i]["nombre"].' '.$users[$i]["apellidos"].'</td>');
						echo('<td>'.$users[$i]["rol"].'</td>');
						echo('<td>'.$users[$i]["username"].'</td>');
						echo('<td>'.$users[$i]["email"].'</td>');
						echo('<td>'.$users[$i]["id"].'</td>');
						echo('<td><a href="../api/deleteUser.php?id='.$users[$i]["id"].'" class="btn"><i class="bi bi-trash3"></i></a></td>');
						echo('</tr>');
					}?>
				</tbody>
			</table>
		</div>
	</div>
</div>