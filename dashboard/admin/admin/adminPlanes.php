<?php require_once '../classes/Plan.php'; ?>
<!DOCTYPE html>
<h4>Administrador de Planes</h4>
<table class="table" style="width:100%">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Nombre</th>
		<th scope="col">Fecha</th>
		<th scope="col">ID</th>
		<th scope="col"></th>
		<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
	<?php
		$planes = Plan::get_all_planes();
		foreach ($planes as $i => $value):?>
			<tr>
			<th scope="row"><?php echo($i + 1)?></th>
			<td><?php echo($planes[$i]["nombre"])?></td>
			<td><?php echo($planes[$i]["fecha"])?></td>
			<td><?php echo($planes[$i]["id"])?></td>
			<?php if(Plan::is_tendencia($planes[$i]["id"])){
				echo('<td><a class="btn" href="../api/tendencias.php?action=delete&tipo=plan&id='.Plan::is_tendencia($planes[$i]["id"]).'"><i class="bi bi-star-fill"></i></a></td>');
			}else{
				echo('<td><a class="btn" href="../api/tendencias.php?action=new&tipo=plan&id_plan='.$planes[$i]["id"].'"><i class="bi bi-star"></i></a></td>');
			}?>
			<td><a class="btn" href="adminPage.php?content=admin&form=planes&id=<?php echo($planes[$i]["id"])?>"><i class="bi bi-pencil-square"></i></a></td>
			<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#DeleteUserModal<?php echo($planes[$i]["id"])?>"><i class="bi bi-trash3"></i></button></td>
			</tr>
			<div class="modal fade" id="DeleteUserModal<?php echo($planes[$i]["id"])?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteUserModalLabel<?php echo($planes[$i]["id"])?>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="DeleteUserModalLabel<?php echo($planes[$i]["id"])?>">Confirm deletion</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						You are going to delete the plan with ID: <?php echo($planes[$i]["id"])?> and name: <?php echo($planes[$i]["nombre"])?>
						Are you sure you want to delete?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<a href="../api/plan.php?action=delete&id=<?php echo($planes[$i]["id"])?>"><button type="button" class="btn btn-primary">Ok</button></a>
					</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</tbody>
</table>