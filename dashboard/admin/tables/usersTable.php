<!DOCTYPE html>
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
		</tr>
	</thead>
	<tbody>
	<?php
		$users = Usuario::get_all_users();
		foreach ($users as $i => $value) {
			echo('<tr>');
			echo('<th scope="row">'.($i + 1).'</th>');
			echo('<td><img src="../files/users/'.$users[$i]["username"].'/'.$users[$i]["avatar"].'" width="32" height="32" class="rounded-circle"> '.$users[$i]["nombre"].' '.$users[$i]["apellidos"].'</td>');
			echo('<td>'.$users[$i]["rol"].'</td>');
			echo('<td>'.$users[$i]["username"].'</td>');
			echo('<td>'.$users[$i]["email"].'</td>');
			echo('<td>'.$users[$i]["id"].'</td>');
			echo('</tr>');
		}?>
	</tbody>
</table>