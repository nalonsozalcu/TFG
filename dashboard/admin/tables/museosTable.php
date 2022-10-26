<?php require_once '../classes/Museo.php'; ?>
<!DOCTYPE html>
<h5>Museos</h5>
<table id="example" class="table table-striped" style="width:100%">
	<thead>
		<tr>
		<th scope="col">ID</th>
		<th scope="col">Nombre</th>
		<th scope="col">Descripción</th>
		<th scope="col">Horario</th>
		<th scope="col">Transporte</th>
		<th scope="col">URL</th>
		<th scope="col">Email</th>
		<th scope="col">Telefono</th>
		<th scope="col">Dir.</th>
		<th scope="col">C.P.</th>
		<th scope="col">Sitio</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$museos = Museo::get_all_museos();
		if($museos):
			foreach ($museos as $i => $value):?>
				<tr>
					<td><?php echo($museos[$i]["id"])?></td>
					<td><?php echo($museos[$i]["nombre"])?></td>
					<td><?php echo($museos[$i]["descripcion"])?></td>
					<td><?php echo($museos[$i]["horario"])?></td>
					<td><?php echo($museos[$i]["transporte"])?></td>
					<td><?php echo($museos[$i]["url"])?></td>
					<td><?php echo($museos[$i]["email"])?></td>
					<td><?php echo($museos[$i]["telefono"])?></td>
					<td><?php echo($museos[$i]["direccion"])?></td>
					<td><?php echo($museos[$i]["codpostal"])?></td>
					<td><?php echo($museos[$i]["desc_sitio"])?></td>
				</tr>
			<?php endforeach; 
		endif;?>
	</tbody>
</table>