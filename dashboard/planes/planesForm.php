<!DOCTYPE html>
<?php 
if(isset($_GET["id"])){
	require_once '../classes/Plan.php';
	$id =  $_GET["id"];
	$plan = Plan::get_plan_by_id($id);
} ?>
<form class="form mb-3 mt-md-2" method="POST" action="../api/plan.php?action=<?php echo(isset($_GET["id"]) ? "update&id=$id": "new")?>">
	<h5 class="mb-5">Formulario de planes</h5>
	<div class="container">
		<div class="row mb-3">
			<div class="col">
				<div class="form-group">
					<label for="nombre" class="form-label ">Nombre</label>
					<input
						type="text"
						id="nombre"
						name="nombre"
						value="<?php if(isset($_GET["id"])) echo($plan->nombre()) ?>"
						class="form-control"
						placeholder="nombre"
						required
					/>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="fecha" class="form-label ">Fecha</label>
					<input
						type="date"
						id="fecha"
						name="fecha"
						value="<?php if(isset($_GET["id"])) echo($plan->fecha()) ?>"
						class="form-control"
						placeholder="06/12/2000"
						required
					/>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col">
				<div class="form-group">
					<label for="descripcion" class="form-label ">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" value="<?php if(isset($_GET["id"])) echo($plan->descripcion()) ?>" rows="3"></textarea>
				</div>
			</div>
		</div>
	
		
			
			
			
		
		<div class="row justify-content-end">
			<div class="col-1">
				<?php if(isset($_GET["id"])) {?>
					<button class="btn btn-primary" type="submit">Actualizar</a>
				<?php }else {?>
					<button class="btn btn-primary" type="submit">Guardar</button>
				<?php }?>
			</div>
		</div>
	</div>
</form>