<?php require_once '../classes/Monumento.php'; ?>
<!DOCTYPE html>
<h5>Eventos</h5>
<table id="example" class="table table-striped" style="width:100%">
	<thead>
		<tr>
		<th scope="col">ID</th>
		<th scope="col">Nombre</th>
		<th scope="col">Descripción</th>
		<th scope="col">Fecha Fin</th>
		<th scope="col">Fecha Inicio</th>
		<th scope="col">Audiencia</th>
		<th scope="col">Horario</th>
		<th scope="col">Transporte</th>
		<th scope="col">URL</th>
		<th scope="col">Email</th>
		<th scope="col">Telefono</th>
		<th scope="col">Lugar</th>
		<th scope="col">Dir.</th>
		<th scope="col">C.P.</th>
		<th scope="col">Sitio</th>
		<th scope="col">Precio</th>
		<th scope="col">Gratis</th>
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
					<td><?php echo($monumentos[$i]["fecha_fin"])?></td>
					<td><?php echo($monumentos[$i]["fecha_ini"])?></td>
					<td><?php echo($monumentos[$i]["audiencia"])?></td>
					<td><?php echo($monumentos[$i]["horario"])?></td>
					<td><?php echo($monumentos[$i]["transporte"])?></td>
					<td><?php echo($monumentos[$i]["url"])?></td>
					<td><?php echo($monumentos[$i]["email"])?></td>
					<td><?php echo($monumentos[$i]["telefono"])?></td>
					<td><?php echo($monumentos[$i]["lugar"])?></td>
					<td><?php echo($monumentos[$i]["direccion"])?></td>
					<td><?php echo($monumentos[$i]["codpostal"])?></td>
					<td><?php echo($monumentos[$i]["desc_sitio"])?></td>
					<td><?php echo($monumentos[$i]["precio"])?></td>
					<td><?php echo($monumentos[$i]["gratis"])?></td>
				</tr>
			<?php endforeach; 
		endif;?>
	</tbody>
</table>