<!DOCTYPE html>
<div class="vh-80 d-flex justify-content-center align-items-center">
	<div class="container">
		<div class="row mt-3 mb-3 d-flex justify-content-start">
			<h4>Tablas de datos</h4>
		</div>
		<div class="row d-flex justify-content-center">
			<h5>Usuarios</h5>
			<table id="example" class="table table-striped" style="width:100%">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Full name</th>
					<th scope="col">Role</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th scope="col">User ID</th>
					<!-- <th scope="col"></th> -->
					</tr>
				</thead>
				<tbody>
				<?php
					$users = Usuario::get_all_users();
					foreach ($users as $i => $value) {
						echo('<tr>');
						echo('<th scope="row">'.($i + 1).'</th>');
						echo('<td><img src="../files/users'.$users[$i]["avatar"].'" width="32" height="32" class="rounded-circle"> '.$users[$i]["nombre"].' '.$users[$i]["apellidos"].'</td>');
						echo('<td>'.$users[$i]["rol"].'</td>');
						echo('<td>'.$users[$i]["username"].'</td>');
						echo('<td>'.$users[$i]["email"].'</td>');
						echo('<td>'.$users[$i]["id"].'</td>');
						// echo('<td><a href="../api/deleteUser.php?id='.$users[$i]["id"].'" class="btn"><i class="bi bi-trash3"></i></a></td>');
						echo('</tr>');
					}?>
				</tbody>
			</table>
		</div>
	</div>
</div>