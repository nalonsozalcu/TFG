<?php require_once '../classes/Evento.php'; ?>
<!DOCTYPE html>
<h4>Administrador de Eventos</h4>
<div class="row d-flex justify-content-end">
<?php
	if(isset($_GET['ok'])){
		if($_GET['ok'] == "true")
			echo '<div class="w-25 p-3 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha eliminado correctamente el evento
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		else
			echo '<div class="w-25 p-3 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No se ha eliminado el evento
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}
?>
</div>
<table class="table" style="width:100%">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Nombre</th>
		<th scope="col">Direccion</th>
		<th scope="col">Precio</th>
		<th scope="col">Evento ID</th>
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
						<a href="../api/deleteEventos.php?id=<?php echo($eventos[$i]["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
					</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</tbody>
</table>