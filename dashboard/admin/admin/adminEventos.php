<?php require_once '../classes/Evento.php'; ?>
<!DOCTYPE html>
<h4>Administrador de Eventos</h4>
<table class="table" style="width:100%">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Nombre</th>
		<th scope="col">Direccion</th>
		<th scope="col">Precio</th>
		<th scope="col">ID</th>
		<th scope="col"></th>
		<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
	<?php
		$eventos = Evento::get_all_eventos();
		foreach ($eventos as $i => $value):?>
			<tr>
			<th scope="row"><?php echo($i + 1)?></th>
			<td><?php echo($eventos[$i]["nombre"])?></td>
			<td><?php echo($eventos[$i]["direccion"])?></td>
			<td><?php echo($eventos[$i]["precio"])?></td>
			<td><?php echo($eventos[$i]["id"])?></td>
			<td><a class="btn" href="adminPage.php?content=admin&form=eventos&id=<?php echo($eventos[$i]["id"])?>"><i class="bi bi-pencil-square"></i></a></td>
			<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($eventos[$i]["id"])?>"><i class="bi bi-trash3"></i></button></td>
			</tr>
			<div class="modal fade" id="DeleteUserModal<?php echo($eventos[$i]["id"])?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteUserModalLabel<?php echo($eventos[$i]["id"])?>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="DeleteUserModalLabel<?php echo($eventos[$i]["id"])?>">Confirm deletion</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						You are going to delete the eventos with ID: <?php echo($eventos[$i]["id"])?> and name: <?php echo($eventos[$i]["nombre"])?>
						Are you sure you want to delete?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<a href="../api/evento.php?action=delete&id=<?php echo($eventos[$i]["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
					</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</tbody>
</table>