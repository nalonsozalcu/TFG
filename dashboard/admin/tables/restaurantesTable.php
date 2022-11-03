<?php require_once '../classes/Restaurante.php'; ?>
<!DOCTYPE html>
<h5>Restaurantes</h5>
<table id="example" class="table table-striped" style="width:100%">
	<thead>
		<tr>
		<th scope="col">ID</th>
		<th scope="col">Nombre</th>
		<th scope="col">URL</th>
		<th scope="col">Email</th>
		<th scope="col">Telefono</th>
		<th scope="col">Dir.</th>
		<th scope="col">C.P.</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$restaurantes = Restaurante::get_all_restaurantes();
		if($restaurantes):
			foreach ($restaurantes as $i => $value):?>
				<tr>
					<td><?php echo($restaurantes[$i]["id"])?></td>
					<td><?php echo($restaurantes[$i]["nombre"])?></td>
					<td><?php echo($restaurantes[$i]["url"])?></td>
					<td><?php echo($restaurantes[$i]["email"])?></td>
					<td><?php echo($restaurantes[$i]["telefono"])?></td>
					<td><?php echo($restaurantes[$i]["direccion"])?></td>
					<td><?php echo($restaurantes[$i]["codpostal"])?></td>
				</tr>
			<?php endforeach; 
		endif;?>
	</tbody>
</table>