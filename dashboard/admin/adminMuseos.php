<!DOCTYPE html>
<div class="vh-80 d-flex justify-content-center align-items-center">
	<div class="container-fluid">
		<div class="row mt-3 mb-3 d-flex justify-content-start">
			<h4>Administrador de Museos</h4>
		</div>
		<div class="row d-flex justify-content-end">
		<?php
			if(isset($_GET['ok'])){
				if($_GET['ok'] == "true")
					echo '<div class="w-25 p-3 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha eliminado correctamente el museo
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
				else
					echo '<div class="w-25 p-3 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No se ha eliminado el museo
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
		?>
		</div>
		<div class="row d-flex justify-content-center">
			<table class="table" style="width:100%">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Horario</th>
					<th scope="col">Transporte</th>
					<th scope="col">Url</th>
					<th scope="col">Direccion</th>
					<th scope="col">Telefono</th>
					<th scope="col">Email</th>
					<th scope="col">Museo ID</th>
					<th scope="col"></th>
					<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$museos = Museo::get_all_museos();
					foreach ($museos as $i => $value):?>
						<tr>
						<th scope="row"><?php echo($i + 1)?></th>
						<td><?php echo($museos[$i]["nombre"])?></td>
						<td><?php echo($museos[$i]["horario"])?></td>
						<td><?php echo($museos[$i]["transporte"])?></td>
						<td><?php echo($museos[$i]["url"])?></td>
						<td><?php echo($museos[$i]["direccion"])?></td>
						<td><?php echo($museos[$i]["telefono"])?></td>
						<td><?php echo($museos[$i]["email"])?></td>
						<td><?php echo($museos[$i]["id"])?></td>
						<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($museos[$i]["id"])?>"><i class="bi bi-trash3"></i></button></td>
						<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($museos[$i]["id"])?>"><i class="bi bi-trash3"></i></button></td>
						</tr>
						<div class="modal fade" id="DeleteUserModal<?php echo($museos[$i]["id"])?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteUserModalLabel<?php echo($museos[$i]["id"])?>" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="DeleteUserModalLabel<?php echo($museos[$i]["id"])?>">Confirm deletion</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									You are going to delete the museo with ID: <?php echo($museos[$i]["id"])?> and name: <?php echo($museos[$i]["nombre"])?>
									Are you sure you want to delete?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									<a href="../api/deleteMuseo.php?id=<?php echo($museos[$i]["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
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