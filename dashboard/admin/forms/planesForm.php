<?php require_once '../config.php';?>

<!DOCTYPE html>
<?php 
if(isset($_GET["id"])){
	require_once '../classes/Plan.php';
	$id =  $_GET["id"];
	$plan = Plan::get_plan_by_id($id);
} ?>
<form class="form mb-3 mt-md-2" method="POST" id="planform" action="../api/plan.php?action=<?php echo(isset($_GET["id"]) ? "update&id=$id": "new")?>">
	
<?php  if(isset($_GET["id"])){
		echo('<h5 class="mb-5">Modificar plan</h5>');
	} else { ?>
	<div class="row justify-content-between mb-3">
		<div class="col-2">
			<h5 class="mb-5">Crear un plan nuevo</h5>
		</div>
		<div class="col-2">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#generatePlanModal">
				Generar plan automaticamente
			</button>
		</div>
	<?php } ?>
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
					<textarea class="form-control" form="planform" id="descripcion" name="descripcion" rows="3"><?php if(isset($_GET["id"])) echo($plan->descripcion()) ?></textarea>
				</div>
			</div>
		</div>
		<?php if(isset($_GET["id"])){ 
					if($plan->tipo_act_1() == "Museo") $actividades = Museo::get_all_museos();
					if($plan->tipo_act_1() == "Restaurante") $actividades = Restaurante::get_all_restaurantes();
					if($plan->tipo_act_1() == "Monumento") $actividades = Monumento::get_all_monumentos();
					if($plan->tipo_act_1() == "Evento") $actividades = Evento::get_all_eventos();
			} else {
				$actividades = Museo::get_all_museos();
		}?>
		<div class="row mb-3" id="div_1">
			<div class="col-2">
				<div class="form-group">
					<label for="hora_act_1" class="form-label ">Hora</label>
					<input
						type="text"
						id="hora_act_1"
						name="hora_act_1"
						value="<?php if(isset($_GET["id"])) echo($plan->hora_act_1()) ?>"
						class="form-control"
						placeholder="10:00"
						required
					/>
				</div>
			</div>
			<div class="col-3">
				<label for="tipo_1" class="form-label ">Tipo</label>
				<select name="tipo_1" id="tipo_1" class="form-select" aria-label="tipo" required>
					<option value="0">Selecciona un elemento</option>
					<option value="Museo" <?php if(isset($_GET["id"]) && $plan->tipo_act_1() == "Museo" ) echo("selected") ?>>Museo</option>
					<option value="Restaurante" <?php if(isset($_GET["id"]) && $plan->tipo_act_1() == "Restaurante" ) echo("selected") ?>>Restaurante</option>
					<option value="Monumento" <?php if(isset($_GET["id"]) && $plan->tipo_act_1() == "Monumento" ) echo("selected") ?>>Monumento</option>
					<option value="Evento" <?php if(isset($_GET["id"]) && $plan->tipo_act_1() == "Evento" ) echo("selected") ?>>Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_1" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_1" id="id_1" class="form-select" aria-label="Actividades" required>
					<option value="0">Selecciona un elemento</option>
					<?php foreach($actividades as $actividad){
						?> <option <?php if(isset($_GET["id"]) && $actividad["id"] == $plan->id_act_1()) echo("selected"); ?> value="<?php echo($actividad["id"]); ?>"><?php echo($actividad["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-1 align-self-end" id="div_button_1">
				<button type="button" id="button_1" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
			</div>
		</div>
		<div class="row mb-3" id="div_2" <?php if(isset($_GET["id"]) && $plan->id_act_2() == 0 ) echo("hidden") ?> <?php if(!isset($_GET["id"]))echo("hidden") ?>>
			<div class="col-2">
				<div class="form-group">
					<label for="hora_act_2" class="form-label ">Hora</label>
					<input
						type="text"
						id="hora_act_2"
						name="hora_act_2"
						value="<?php if(isset($_GET["id"])) echo($plan->hora_act_2()) ?>"
						class="form-control"
						placeholder="10:00"
					/>
				</div>
			</div>
			<?php if(isset($_GET["id"]) && $plan->id_act_2() != 0){ 
					if($plan->tipo_act_2() == "Museo") $actividades_2 = Museo::get_all_museos();
					if($plan->tipo_act_2() == "Restaurante") $actividades_2 = Restaurante::get_all_restaurantes();
					if($plan->tipo_act_2() == "Monumento") $actividades_2 = Monumento::get_all_monumentos();
					if($plan->tipo_act_2() == "Evento") $actividades_2 = Evento::get_all_eventos();
				} else {
					$actividades_2 = Museo::get_all_museos();
			}?>
			<div class="col-3">
				<label for="tipo_2" class="form-label ">Tipo</label>
				<select name="tipo_2" id="tipo_2" class="form-select" aria-label="tipo">
					<option value="0">Selecciona un elemento</option>
					<option value="Museo" <?php if(isset($_GET["id"]) && $plan->tipo_act_2() == "Museo" ) echo("selected") ?>>Museo</option>
					<option value="Restaurante" <?php if(isset($_GET["id"]) && $plan->tipo_act_2() == "Restaurante" ) echo("selected") ?>>Restaurante</option>
					<option value="Monumento" <?php if(isset($_GET["id"]) && $plan->tipo_act_2() == "Monumento" ) echo("selected") ?>>Monumento</option>
					<option value="Evento" <?php if(isset($_GET["id"]) && $plan->tipo_act_2() == "Evento" ) echo("selected") ?>>Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_2" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_2" id="id_2" class="form-select" aria-label="Actividades">
					<option value="0">Selecciona un elemento</option>
					<?php foreach($actividades_2 as $actividad){
						?> <option <?php if(isset($_GET["id"]) && $actividad["id"] == $plan->id_act_2()) echo("selected"); ?> value="<?php echo($actividad["id"]); ?>"><?php echo($actividad["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-2 align-self-end">
				<button type="button" id="button_2_delete" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
				<button type="button" id="button_2_add" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
			</div>
		</div>
		<div class="row mb-3" id="div_3" <?php if(isset($_GET["id"]) && $plan->id_act_3() == 0 ) echo("hidden") ?> <?php if(!isset($_GET["id"]))echo("hidden") ?>>
			<div class="col-2">
				<div class="form-group">
					<label for="hora_act_3" class="form-label ">Hora</label>
					<input
						type="text"
						id="hora_act_3"
						name="hora_act_3"
						value="<?php if(isset($_GET["id"])) echo($plan->hora_act_3()) ?>"
						class="form-control"
						placeholder="10:00"
					/>
				</div>
			</div>
			<?php if(isset($_GET["id"]) && $plan->id_act_3() != 0){ 
					if($plan->tipo_act_3() == "Museo") $actividades_3 = Museo::get_all_museos();
					if($plan->tipo_act_3() == "Restaurante") $actividades_3 = Restaurante::get_all_restaurantes();
					if($plan->tipo_act_3() == "Monumento") $actividades_3 = Monumento::get_all_monumentos();
					if($plan->tipo_act_3() == "Evento") $actividades_3 = Evento::get_all_eventos();
				} else {
					$actividades_3 = Museo::get_all_museos();
			}?>
			<div class="col-3">
				<label for="tipo_3" class="form-label ">Tipo</label>
				<select name="tipo_3" id="tipo_3" class="form-select" aria-label="tipo">
					<option value="0">Selecciona un elemento</option>
					<option value="Museo" <?php if(isset($_GET["id"]) && $plan->tipo_act_3() == "Museo" ) echo("selected") ?>>Museo</option>
					<option value="Restaurante" <?php if(isset($_GET["id"]) && $plan->tipo_act_3() == "Restaurante" ) echo("selected") ?>>Restaurante</option>
					<option value="Monumento" <?php if(isset($_GET["id"]) && $plan->tipo_act_3() == "Monumento" ) echo("selected") ?>>Monumento</option>
					<option value="Evento" <?php if(isset($_GET["id"]) && $plan->tipo_act_3() == "Evento" ) echo("selected") ?>>Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_3" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_3" id="id_3" class="form-select" aria-label="Actividades">
					<option value="0">Selecciona un elemento</option>
				<?php
					foreach($actividades_3 as $actividad){
						?> <option <?php if(isset($_GET["id"]) && $actividad["id"] == $plan->id_act_3()) echo("selected"); ?> value="<?php echo($actividad["id"]); ?>"><?php echo($actividad["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-2 align-self-end">
				<button type="button" id="button_3_delete" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
				<button type="button" id="button_3_add" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
			</div>
		</div>
		<div class="row mb-3" id="div_4" <?php if(isset($_GET["id"]) && $plan->id_act_4() == 0 ) echo("hidden") ?> <?php if(!isset($_GET["id"]))echo("hidden") ?>>
			<div class="col-2">
				<div class="form-group">
					<label for="hora_act_4" class="form-label ">Hora</label>
					<input
						type="text"
						id="hora_act_4"
						name="hora_act_4"
						value="<?php if(isset($_GET["id"])) echo($plan->hora_act_4()) ?>"
						class="form-control"
						placeholder="10:00"
					/>
				</div>
			</div>
			<?php if(isset($_GET["id"]) && $plan->id_act_4() != 0){ 
					if($plan->tipo_act_4() == "Museo") $actividades_4 = Museo::get_all_museos();
					if($plan->tipo_act_4() == "Restaurante") $actividades_4 = Restaurante::get_all_restaurantes();
					if($plan->tipo_act_4() == "Monumento") $actividades_4 = Monumento::get_all_monumentos();
					if($plan->tipo_act_4() == "Evento") $actividades_4 = Evento::get_all_eventos();
				} else {
					$actividades_4 = Museo::get_all_museos();
			}?>
			<div class="col-3">
				<label for="tipo_4" class="form-label ">Tipo</label>
				<select name="tipo_4" id="tipo_4" class="form-select" aria-label="tipo">
					<option value="0">Selecciona un elemento</option>
					<option value="Museo" <?php if(isset($_GET["id"]) && $plan->tipo_act_4() == "Museo" ) echo("selected") ?>>Museo</option>
					<option value="Restaurante" <?php if(isset($_GET["id"]) && $plan->tipo_act_4() == "Restaurante" ) echo("selected") ?>>Restaurante</option>
					<option value="Monumento" <?php if(isset($_GET["id"]) && $plan->tipo_act_4() == "Monumento" ) echo("selected") ?>>Monumento</option>
					<option value="Evento" <?php if(isset($_GET["id"]) && $plan->tipo_act_4() == "Evento" ) echo("selected") ?>>Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_4" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_4" id="id_4" class="form-select" aria-label="Actividades">
					<option value="0">Selecciona un elemento</option>
				<?php
					foreach($actividades_4 as $actividad){
						?> <option <?php if(isset($_GET["id"]) && $actividad["id"] == $plan->id_act_4()) echo("selected"); ?> value="<?php echo($actividad["id"]); ?>"><?php echo($actividad["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-2 align-self-end">
				<button type="button" id="button_4_delete" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
				<button type="button" id="button_4_add" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
			</div>
		</div>
		<div class="row mb-3" id="div_5" <?php if(isset($_GET["id"]) && $plan->id_act_5() == 0 ) echo("hidden") ?> <?php if(!isset($_GET["id"]))echo("hidden") ?>>
			<div class="col-2">
				<div class="form-group">
					<label for="hora_act_5" class="form-label ">Hora</label>
					<input
						type="text"
						id="hora_act_5"
						name="hora_act_5"
						value="<?php if(isset($_GET["id"])) echo($plan->hora_act_5()) ?>"
						class="form-control"
						placeholder="10:00"
					/>
				</div>
			</div>
			<?php if(isset($_GET["id"]) && $plan->id_act_5() != 0){ 
					if($plan->tipo_act_5() == "Museo") $actividades_5 = Museo::get_all_museos();
					if($plan->tipo_act_5() == "Restaurante") $actividades_5 = Restaurante::get_all_restaurantes();
					if($plan->tipo_act_5() == "Monumento") $actividades_5 = Monumento::get_all_monumentos();
					if($plan->tipo_act_5() == "Evento") $actividades_5 = Evento::get_all_eventos();
				} else {
					$actividades_5 = Museo::get_all_museos();
			}?>
			<div class="col-3">
				<label for="tipo_5" class="form-label ">Tipo</label>
				<select name="tipo_5" id="tipo_5" class="form-select" aria-label="tipo">
					<option value="0">Selecciona un elemento</option>
					<option value="Museo" <?php if(isset($_GET["id"]) && $plan->tipo_act_5() == "Museo" ) echo("selected") ?>>Museo</option>
					<option value="Restaurante" <?php if(isset($_GET["id"]) && $plan->tipo_act_5() == "Restaurante" ) echo("selected") ?>>Restaurante</option>
					<option value="Monumento" <?php if(isset($_GET["id"]) && $plan->tipo_act_5() == "Monumento" ) echo("selected") ?>>Monumento</option>
					<option value="Evento" <?php if(isset($_GET["id"]) && $plan->tipo_act_5() == "Evento" ) echo("selected") ?>>Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_5" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_5" id="id_5" class="form-select" aria-label="Actividades">
					<option value="0">Selecciona un elemento</option>
				<?php
					foreach($actividades_5 as $actividad){
						?> <option <?php if(isset($_GET["id"]) && $actividad["id"] == $plan->id_act_5()) echo("selected"); ?> value="<?php echo($actividad["id"]); ?>"><?php echo($actividad["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-1 align-self-end">
				<button type="button" id="button_5" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-2">
				<?php if(isset($_GET["id"])) {?>
					<button class="btn btn-primary" type="submit">Actualizar</a>
				<?php }else {?>
					<button class="btn btn-primary" type="submit">Guardar</button>
				<?php }?>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	var tipos_1 = document.getElementById("tipo_1");
	var actividades_1 = document.getElementById("id_1");
	var button_1 = document.getElementById("button_1");

	var tipos_2 = document.getElementById("tipo_2");
	var actividades_2 = document.getElementById("id_2");
	var button_2_add = document.getElementById("button_2_add");
	var button_2_delete = document.getElementById("button_2_delete");


	var tipos_3 = document.getElementById("tipo_3");
	var actividades_3 = document.getElementById("id_3");
	var button_3_add = document.getElementById("button_3_add");
	var button_3_delete = document.getElementById("button_3_delete");

	var tipos_4 = document.getElementById("tipo_4");
	var actividades_4 = document.getElementById("id_4");
	var button_4_add = document.getElementById("button_4_add");
	var button_4_delete = document.getElementById("button_4_delete");

	var tipos_5 = document.getElementById("tipo_5");
	var actividades_5 = document.getElementById("id_5");
	var button_5 = document.getElementById("button_5");

	tipos_1.addEventListener("change", function() {
		addOptions(tipos_1.value, actividades_1);
	});
	button_1.addEventListener("click", function() {
		document.getElementById("div_2").removeAttribute("hidden");
		button_1.style.display = 'none';
	});

	tipos_2.addEventListener("change", function() {
		addOptions(tipos_2.value, actividades_2);
	});
	button_2_add.addEventListener("click", function() {
		document.getElementById("div_3").removeAttribute("hidden");
		button_2_add.style.display = 'none';
		button_2_delete.style.display = 'none';
	});
	button_2_delete.addEventListener("click", function() {
		reset(actividades_2);
		document.getElementById("div_2").setAttribute("hidden", true);
		button_1.style.display = 'inline';
	});

	tipos_3.addEventListener("change", function() {
		addOptions(tipos_3.value, actividades_3);
	});
	button_3_add.addEventListener("click", function() {
		document.getElementById("div_4").removeAttribute("hidden");
		button_3_add.style.display = 'none';
		button_3_delete.style.display = 'none';
	});
	button_3_delete.addEventListener("click", function() {
		reset(actividades_3);
		document.getElementById("div_3").setAttribute("hidden", true);
		button_2_add.style.display = 'inline';
		button_2_delete.style.display = 'inline';
	});

	tipos_4.addEventListener("change", function() {
		addOptions(tipos_4.value, actividades_4);
	});
	button_4_add.addEventListener("click", function() {
		document.getElementById("div_5").removeAttribute("hidden");
		button_4_add.style.display = 'none';
		button_4_delete.style.display = 'none';
	});
	button_4_delete.addEventListener("click", function() {
		reset(actividades_4);
		document.getElementById("div_4").setAttribute("hidden", true);
		button_3_add.style.display = 'inline';
		button_3_delete.style.display = 'inline';
	});

	tipos_5.addEventListener("change", function() {
		addOptions(tipos_5.value, actividades_5);
	});
	button_5.addEventListener("click", function() {
		reset(actividades_5);
		document.getElementById("div_5").setAttribute("hidden", true);
		button_4_add.style.display = 'inline';
		button_4_delete.style.display = 'inline';
	});

	function addOptions(tipo, select) {
		limpiar(select);
		let  elementos = []
		if(tipo == "Museo") {elementos = <?php echo json_encode(Museo::get_all_museos()); ?>};
		if(tipo == "Restaurante") {elementos = <?php echo json_encode(Restaurante::get_all_restaurantes()); ?>;}
		if(tipo == "Evento") {elementos = <?php echo json_encode(Evento::get_all_eventos()); ?>;}
		if(tipo == "Monumento") {elementos = <?php echo json_encode(Monumento::get_all_monumentos()); ?>;
}
		for(var i=0;i<elementos.length;i++)
		{
			var option = document.createElement('option');
			option.value = elementos[i]["id"];
			option.text = elementos[i]["nombre"];
			select.appendChild(option);
		}
		
	}

	function limpiar(select) {
		for (let i = select.options.length; i >= 1; i--) {
			select.remove(i);
		}
	}

	function reset(select) {
		select.value = 0;
	}

</script>