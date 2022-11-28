<?php require_once '../classes/Monumento.php'; ?>
<!DOCTYPE html>
<h4>Administrador de Monumentos</h4>
<table class="table" style="width:100%">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Nombre</th>
		<th scope="col">Direccion</th>
		<th scope="col">Autores</th>
		<th scope="col">ID</th>
		<th scope="col"></th>
		<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
	<?php
		$monumentos = Monumento::get_all_monumentos();
		foreach ($monumentos as $i => $value):?>
			<tr>
			<th scope="row"><?php echo($i + 1)?></th>
			<td><?php echo($monumentos[$i]["nombre"])?></td>
			<td><?php echo($monumentos[$i]["direccion"])?></td>
			<td><?php echo($monumentos[$i]["autores"])?></td>
			<td><?php echo($monumentos[$i]["id"])?></td>
			<?php if(Monumento::is_tendencia($monumentos[$i]["id"])){
				echo('<td><a class="btn" href="../api/tendencias.php?action=delete&tipo=monumentos&id='.Monumento::is_tendencia($monumentos[$i]["id"]).'"><i class="bi bi-star-fill"></i></a></td>');
			}else{
				echo('<td><a class="btn" href="../api/tendencias.php?action=new&tipo=monumentos&id_actividad='.$monumentos[$i]["id"].'"><i class="bi bi-star"></i></a></td>');
			}?>
			<td><a class="btn" href="adminPage.php?content=admin&form=monumentos&id=<?php echo($monumentos[$i]["id"])?>"><i class="bi bi-pencil-square"></i></a></td>
			<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($monumentos[$i]["id"])?>"><i class="bi bi-trash3"></i></button></td>
			</tr>
			<div class="modal fade" id="DeleteUserModal<?php echo($monumentos[$i]["id"])?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteUserModalLabel<?php echo($monumentos[$i]["id"])?>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="DeleteUserModalLabel<?php echo($monumentos[$i]["id"])?>">Confirm deletion</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						You are going to delete the monumento with ID: <?php echo($monumentos[$i]["id"])?> and name: <?php echo($monumentos[$i]["nombre"])?>
						Are you sure you want to delete?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<a href="../api/monumento.php?action=delete&id=<?php echo($monumentos[$i]["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
					</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</tbody>
</table>