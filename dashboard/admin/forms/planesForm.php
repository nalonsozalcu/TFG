<!DOCTYPE html>
<?php 
if(isset($_GET["id"])){
	require_once '../classes/Plan.php';
	$id =  $_GET["id"];
	$plan = Plan::get_plan_by_id($id);
}else{
?>
<form class="form mb-3 mt-md-2" method="POST" action="../api/categoria.php?type=monumentos">
	<h5 class="mb-3">Añadir categoría</h5>
	<div class="container">
		<div class="row mb-3">
			<div class="col-3">
				<div class="form-group">
					<label for="categoria" class="form-label ">Categoría</label>
					<input
						type="text"
						id="categoria"
						name="categoria"
						class="form-control"
						placeholder="categoria"
						required
					/>
				</div>
			</div>
			<div class="col-2 align-self-end">
				<button class="btn btn-primary" type="submit"><i class="bi bi-plus"></i></button>
			</div>
		</div>
	</div>
</form>
<?php } ?>
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
						type="text"
						id="fecha"
						name="fecha"
						value="<?php if(isset($_GET["id"])) echo($plan->fecha()) ?>"
						class="form-control"
						placeholder="año"
						required
					/>
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