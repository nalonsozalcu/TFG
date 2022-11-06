<?php require_once '../classes/Evento.php'; ?>
<!DOCTYPE html>
<h5>Eventos</h5>
<table id="example" class="table table-striped" style="width:100%">
	<thead>
		<tr>
		<th scope="col">ID</th>
		<th scope="col">Nombre</th>
		<th scope="col">Fecha Inicio</th>
		<th scope="col">Fecha Fin</th>
		<th scope="col">Hora</th>
		<th scope="col">URL</th>
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
		$evento = Evento::get_all_eventos();
		if($evento):
			foreach ($evento as $i => $value):?>
				<tr>
					<td><?php echo($evento[$i]["id"])?></td>
					<td><?php echo($evento[$i]["nombre"])?></td>
					<td><?php echo($evento[$i]["fecha_ini"])?></td>
					<td><?php echo($evento[$i]["fecha_fin"])?></td>
					<td><?php echo($evento[$i]["hora"])?></td>
					<td><?php echo($evento[$i]["url"])?></td>
					<td><?php echo($evento[$i]["lugar"])?></td>
					<td><?php echo($evento[$i]["direccion"])?></td>
					<td><?php echo($evento[$i]["codpostal"])?></td>
					<td><?php echo($evento[$i]["lugar"])?></td>
					<td><?php echo($evento[$i]["precio"])?></td>
					<td><?php echo($evento[$i]["gratis"])?></td>
				</tr>
			<?php endforeach; 
		endif;?>
	</tbody>
</table>