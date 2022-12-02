<?php require_once '../config.php'; ?>
<!DOCTYPE html>
<?php
	$conn = Aplicacion::getConexionBD();
	$query = sprintf("SELECT * FROM `tendencias`");
	$rs = $conn->query($query);
	$tendencias = $rs->fetch_all(MYSQLI_ASSOC);
?>

<div class="container mt-3">
	<?php
		if($tendencias):
			$i = 0;
			while($i < count($tendencias)):
				$j = 0;
			?>
			<div class="row mt-2 mb-3">
			<?php while ($j < 3):
					if($i < count($tendencias)):
						if($tendencias[$i]["tipo_actividad"] == "planes") {$tipo ="plan"; $plan = Plan::get_plan_by_id($tendencias[$i]["id_actividad"]);}
						
						?>
						<div class="col-4">
							<div class="card h-100" style="width: 25rem;">
								<div class="card-body">
									<img class="mb-3" width="30px" src="../assets/img/<?php echo($tipo."_icon.png") ?>" alt="icon">
									<a style="text-decoration:none" href="planes/planPage.php?content=<?php echo($tipo) ?>&id=<?php echo($plan->id()) ?>"><h5><?php echo($plan->nombre()) ?> <i class="bi bi-fire"></i></h5></a>
									<p><?php echo($plan->direccion()) ?></p>
									<?php 
									if($plan->get_global_valoracion($plan->id())){
										for($e=1; $e < 6; $e++){
											if($e <= $plan->get_global_valoracion($plan->id())){
												echo('<i class="bi bi-star-fill text-warning ms-1"></i>');
											}else{
												echo('<i class="bi bi-star-fill ms-1"></i>');
											}
										}
									}?>
								</div>
							</div>
						</div>
				<?php
					endif;
					$i++;
					$j++;
				endwhile;
				?>
			</div>
			<?php
			endwhile; 
		else:
			echo("<p>No hay tendencias nuevas.</p>");
		endif;
	?>
</div>