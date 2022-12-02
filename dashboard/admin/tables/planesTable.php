<?php require_once '../classes/Plan.php'; ?>
<!DOCTYPE html>
<h5>Planes</h5>
<table id="example" class="table table-striped" style="width:100%">
	<thead>
		<tr>
		<th scope="col">ID</th>
		<th scope="col">Nombre</th>
		<th scope="col">Fecha</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$planes = Plan::get_all_planes();
		if($planes):
			foreach ($planes as $i => $value):?>
				<tr>
					<td><?php echo($planes[$i]["id"])?></td>
					<td><?php echo($planes[$i]["nombre"])?></td>
					<td><?php echo($planes[$i]["fecha"])?></td>
				</tr>
			<?php endforeach; 
		endif;?>
	</tbody>
</table>

