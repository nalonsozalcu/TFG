<?php require_once '../classes/Monumento.php'; ?>
<!DOCTYPE html>
<h5>Restaurantes</h5>
<table id="example" class="table table-striped" style="width:100%">
	<thead>
		<tr>
		<th scope="col">ID</th>
		<th scope="col">Nombre</th>
		<th scope="col">Descripción</th>
		<th scope="col">Horario</th>
		<th scope="col">URL</th>
		<th scope="col">Email</th>
		<th scope="col">Telefono</th>
		<th scope="col">Dir.</th>
		<th scope="col">C.P.</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$monumentos = Monumento::get_all_monumentos();
		if($monumentos):
			foreach ($monumentos as $i => $value):?>
				<tr>
					<td><?php echo($monumentos[$i]["id"])?></td>
					<td><?php echo($monumentos[$i]["nombre"])?></td>
					<td><?php echo($monumentos[$i]["descripcion"])?></td>
					<td><?php echo($monumentos[$i]["horario"])?></td>
					<td><?php echo($monumentos[$i]["url"])?></td>
					<td><?php echo($monumentos[$i]["Email"])?></td>
					<td><?php echo($monumentos[$i]["Telefono"])?></td>
					<td><?php echo($monumentos[$i]["direccion"])?></td>
					<td><?php echo($monumentos[$i]["codpostal"])?></td>
				</tr>
			<?php endforeach; 
		endif;?>
	</tbody>
</table>