<!DOCTYPE html>
<div class="vh-80 d-flex justify-content-center align-items-center">
	<div class="container-fluid">
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
					foreach ($users as $i => $value):?>
						<tr>
						<th scope="row"><?php echo($i + 1)?></th>
						<td><img src="../files/users/<?php echo($users[$i]["username"])?>/<?php echo($users[$i]["avatar"])?>" width="32" height="32" class="rounded-circle"> <?php echo($users[$i]["nombre"].' '.$users[$i]["apellidos"])?></td>
						<td><?php echo($users[$i]["rol"])?></td>
						<td><?php echo($users[$i]["username"])?></td>
						<td><?php echo($users[$i]["email"])?></td>
						<td><?php echo($users[$i]["id"])?></td>
						<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($users[$i]["id"])?>"><i class="bi bi-trash3"></i></button></td>
						</tr>
						<div class="modal fade" id="DeleteUserModal<?php echo($users[$i]["id"])?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteUserModalLabel<?php echo($users[$i]["id"])?>" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="DeleteUserModalLabel<?php echo($users[$i]["id"])?>">Confirm deletion</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									You are going to delete the user with ID: <?php echo($users[$i]["id"])?> and username: <?php echo($users[$i]["username"])?>
									Are you sure you want to delete?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									<a href="../api/deleteUser.php?id=<?php echo($users[$i]["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
								</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>