<?php require_once '../config.php';?>

<!DOCTYPE html>
<?php 
if(isset($_GET["id"])){
	require_once '../classes/Plan.php';
	$id =  $_GET["id"];
	$plan = Plan::get_plan_by_id($id);
} ?>
<form class="form mb-3 mt-md-2" method="POST" id="planform" action="../api/plan.php?action=<?php echo(isset($_GET["id"]) ? "update&id=$id": "new")?>">
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
					<textarea class="form-control" form="planform" id="descripcion" name="descripcion" value="<?php if(isset($_GET["id"])) echo($plan->descripcion()) ?>" rows="3"></textarea>
				</div>
			</div>
		</div>
		<label for="tipo_act_1" class="form-label ">Actividades</label>
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
					<option value="Museo">Museo</option>
					<option value="Restaurante">Restaurante</option>
					<option value="Monumento">Monumento</option>
					<option value="Evento">Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_1" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_1" id="id_1" class="form-select" aria-label="Actividades" required>
					<option value="0">Selecciona un elemento</option>
				<?php
					$museos = Museo::get_all_museos();?>
					<?php foreach($museos as $museo){
						?> <option value="<?php echo($museo["id"]); ?>"><?php echo($museo["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-1 align-self-end" id="div_button_1">
				<button type="button" id="button_1" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
			</div>
		</div>
		<div class="row mb-3" id="div_2" hidden>
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
			<div class="col-3">
				<label for="tipo_2" class="form-label ">Tipo</label>
				<select name="tipo_2" id="tipo_2" class="form-select" aria-label="tipo">
					<option value="0">Selecciona un elemento</option>
					<option value="Museo">Museo</option>
					<option value="Restaurante">Restaurante</option>
					<option value="Monumento">Monumento</option>
					<option value="Evento">Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_2" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_2" id="id_2" class="form-select" aria-label="Actividades">
					<option value="0">Selecciona un elemento</option>
				<?php
					$museos = Museo::get_all_museos();?>
					<?php foreach($museos as $museo){
						?> <option value="<?php echo($museo["id"]); ?>"><?php echo($museo["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-2 align-self-end">
				<button type="button" id="button_2_delete" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
				<button type="button" id="button_2_add" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
			</div>
		</div>
		<div class="row mb-3" id="div_3" hidden>
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
			<div class="col-3">
				<label for="tipo_3" class="form-label ">Tipo</label>
				<select name="tipo_3" id="tipo_3" class="form-select" aria-label="tipo">
					<option value="0">Selecciona un elemento</option>
					<option value="Museo">Museo</option>
					<option value="Restaurante">Restaurante</option>
					<option value="Monumento">Monumento</option>
					<option value="Evento">Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_3" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_3" id="id_3" class="form-select" aria-label="Actividades">
					<option value="0">Selecciona un elemento</option>
				<?php
					$museos = Museo::get_all_museos();?>
					<?php foreach($museos as $museo){
						?> <option value="<?php echo($museo["id"]); ?>"><?php echo($museo["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-2 align-self-end">
				<button type="button" id="button_3_delete" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
				<button type="button" id="button_3_add" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
			</div>
		</div>
		<div class="row mb-3" id="div_4" hidden>
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
			<div class="col-3">
				<label for="tipo_4" class="form-label ">Tipo</label>
				<select name="tipo_4" id="tipo_4" class="form-select" aria-label="tipo">
					<option value="0">Selecciona un elemento</option>
					<option value="Museo">Museo</option>
					<option value="Restaurante">Restaurante</option>
					<option value="Monumento">Monumento</option>
					<option value="Evento">Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_4" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_4" id="id_4" class="form-select" aria-label="Actividades">
					<option value="0">Selecciona un elemento</option>
				<?php
					$museos = Museo::get_all_museos();?>
					<?php foreach($museos as $museo){
						?> <option value="<?php echo($museo["id"]); ?>"><?php echo($museo["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-2 align-self-end">
				<button type="button" id="button_4_delete" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
				<button type="button" id="button_4_add" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
			</div>
		</div>
		<div class="row mb-3" id="div_5" hidden>
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
			<div class="col-3">
				<label for="tipo_5" class="form-label ">Tipo</label>
				<select name="tipo_5" id="tipo_5" class="form-select" aria-label="tipo">
					<option value="0">Selecciona un elemento</option>
					<option value="Museo">Museo</option>
					<option value="Restaurante">Restaurante</option>
					<option value="Monumento">Monumento</option>
					<option value="Evento">Evento</option>
				</select>
			</div>
			<div class="col-5">
				<label for="id_5" class="form-label ">Actividad</label>
				<!-- <select name="id_1" id="id_1" class="form-control selectpicker" data-live-search="true"> -->
				<select name="id_5" id="id_5" class="form-select" aria-label="Actividades">
					<option value="0">Selecciona un elemento</option>
				<?php
					$museos = Museo::get_all_museos();?>
					<?php foreach($museos as $museo){
						?> <option value="<?php echo($museo["id"]); ?>"><?php echo($museo["nombre"]); ?></option> <?php
					}?>
				</select>
			</div>
			<div class="col-1 align-self-end">
				<button type="button" id="button_5" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
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