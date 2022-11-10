<?php require_once '../classes/Museo.php'; ?>
<!DOCTYPE html>
<h4>Administrador de Museos</h4>
<!-- <div class="row d-flex justify-content-end">

</div> -->
<table class="table" style="width:100%">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Nombre</th>
		<th scope="col">Direccion</th>
		<th scope="col">Telefono</th>
		<th scope="col">Email</th>
		<th scope="col">ID</th>
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
			<td><?php echo($museos[$i]["direccion"])?></td>
			<td><?php echo($museos[$i]["telefono"])?></td>
			<td><?php echo($museos[$i]["email"])?></td>
			<td><?php echo($museos[$i]["id"])?></td>
			<td><a class="btn" href="adminPage.php?content=admin&form=museos&id=<?php echo($museos[$i]["id"])?>"><i class="bi bi-pencil-square"></i></a></td>
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
						<a href="../api/museo.php?action=delete&id=<?php echo($museos[$i]["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
					</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</tbody>
</table>