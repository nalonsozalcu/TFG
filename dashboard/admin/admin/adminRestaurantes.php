<?php require_once '../classes/Restaurante.php'; ?>
<!DOCTYPE html>
<h4>Administrador de Restaurantes</h4>
<!-- <div class="row d-flex justify-content-end">
<?php
	if(isset($_GET['ok'])){
		if($_GET['ok'] == "true")
			echo '<div class="w-25 p-3 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha eliminado correctamente el restaurante
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		else
			echo '<div class="w-25 p-3 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No se ha eliminado el restaurante
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}
?>
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
		$restaurantes = Restaurante::get_all_restaurantes();
		foreach ($restaurantes as $i => $value):?>
			<tr>
			<th scope="row"><?php echo($i + 1)?></th>
			<td><?php echo($restaurantes[$i]["nombre"])?></td>
			<td><?php echo($restaurantes[$i]["direccion"])?></td>
			<td><?php echo($restaurantes[$i]["telefono"])?></td>
			<td><?php echo($restaurantes[$i]["email"])?></td>
			<td><?php echo($restaurantes[$i]["id"])?></td>
			<td><a class="btn" href="#"><i class="bi bi-pencil-square"></i></a></td>
			<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($restaurantes[$i]["id"])?>"><i class="bi bi-trash3"></i></button></td>
			</tr>
			<div class="modal fade" id="DeleteUserModal<?php echo($restaurantes[$i]["id"])?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteUserModalLabel<?php echo($restaurantes[$i]["id"])?>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="DeleteUserModalLabel<?php echo($restaurantes[$i]["id"])?>">Confirm deletion</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						You are going to delete the restaurante with ID: <?php echo($restaurantes[$i]["id"])?> and name: <?php echo($restaurantes[$i]["nombre"])?>
						Are you sure you want to delete?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<a href="../api/deleteRestaurante.php?id=<?php echo($restaurantes[$i]["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
					</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</tbody>
</table>