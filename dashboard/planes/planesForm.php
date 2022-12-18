<?php require_once '../config.php';?>

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
						value=""
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
					<textarea class="form-control" id="descripcion" name="descripcion" value="" rows="3"></textarea>
				</div>
			</div>
		</div>
		<label for="tipo_act_1" class="form-label ">Actividades</label>
		<div class="row mb-3">
		
			<div class="col">
				<div class="form-group">
						<label for="hora_act_1" class="form-label ">Hora</label>
						<input
							type="text"
							id="hora_act_1"
							name="hora_act_1"
							value="<?php if(isset($_GET["id"])) echo($plan->hora()) ?>"
							class="form-control"
							placeholder="10:00"
						/>
				</div>
			</div>
			
			<div class="col">
				<label for="id_1" class="form-label ">Actividad</label>
				<select name="id_1" id="id_1" class="form-select" aria-label="Default select example">
						
						
					
										<?php
										$favoritos = Usuario::get_favoritos_by_id($_SESSION["idUsuario"]);
										if($favoritos){?>
												<?php foreach($favoritos as $favorito){
													if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
														$icon = "<i class='fa-solid fa-landmark'></i>";
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Museo - ".$actividad->nombre()); ?></option> <?php
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Restaurante - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Monumento - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Evento - ".$actividad->nombre()); ?></option> <?php
														}
													 } 
										}?>
										
																
				</select>						
			</div>
			
			<div class="row mb-3">
		
			<div class="col">
				<div class="form-group">
						<label for="hora_act_1" class="form-label ">Hora</label>
						<input
							type="text"
							id="hora_act_2"
							name="hora_act_2"
							value="<?php if(isset($_GET["id"])) echo($plan->hora()) ?>"
							class="form-control"
							placeholder="10:00"
						/>
				</div>
			</div>
			
			<div class="col">
				<label for="id_2" class="form-label ">Actividad</label>
				<select name="id_2" id="id_2" class="form-select" aria-label="Default select example">
						
						
					
										<?php
										$favoritos = Usuario::get_favoritos_by_id($_SESSION["idUsuario"]);
										if($favoritos){?>
												<?php foreach($favoritos as $favorito){
													if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
														$icon = "<i class='fa-solid fa-landmark'></i>";
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Museo - ".$actividad->nombre()); ?></option> <?php
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Restaurante - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Monumento - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Evento - ".$actividad->nombre()); ?></option> <?php
														}
													 } 
										}?>
										
																
				</select>						
			</div>
			<div class="row mb-3">
		
			<div class="col">
				<div class="form-group">
						<label for="hora_act_1" class="form-label ">Hora</label>
						<input
							type="text"
							id="hora_act_3"
							name="hora_act_3"
							value=""
							class="form-control"
							placeholder="10:00"
						/>
				</div>
			</div>
			
			<div class="col">
				<label for="id_act_3" class="form-label ">Actividad</label>
				<select name="id_3" id="id_3" class="form-select" aria-label="Default select example">
						
						
					
										<?php
										$favoritos = Usuario::get_favoritos_by_id($_SESSION["idUsuario"]);
										if($favoritos){?>
												<?php foreach($favoritos as $favorito){
													if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
														$icon = "<i class='fa-solid fa-landmark'></i>";
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Museo - ".$actividad->nombre()); ?></option> <?php
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Restaurante - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Monumento - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Evento - ".$actividad->nombre()); ?></option> <?php
														}
													 } 
										}?>
										
																
				</select>						
			</div>
			<div class="row mb-3">
		
			<div class="col">
				<div class="form-group">
						<label for="hora_act_4" class="form-label ">Hora</label>
						<input
							type="text"
							id="hora_act_4"
							name="hora_act_4"
							value="<?php if(isset($_GET["id"])) echo($plan->hora()) ?>"
							class="form-control"
							placeholder="10:00"
						/>
				</div>
			</div>
			
			<div class="col">
				<label for="id_4" class="form-label ">Actividad</label>
				<select name="id_4" id="id_4" class="form-select" aria-label="Default select example">
						
						
					
										<?php
										$favoritos = Usuario::get_favoritos_by_id($_SESSION["idUsuario"]);
										if($favoritos){?>
												<?php foreach($favoritos as $favorito){
													if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
														$icon = "<i class='fa-solid fa-landmark'></i>";
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Museo - ".$actividad->nombre()); ?></option> <?php
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Restaurante - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Monumento - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Evento - ".$actividad->nombre()); ?></option> <?php
														}
													 } 
										}?>
										
																
				</select>						
			</div>
			<div class="row mb-3">
		
			<div class="col">
				<div class="form-group">
						<label for="hora_act_5" class="form-label ">Hora</label>
						<input
							type="text"
							id="hora_act_5"
							name="hora_act_5"
							value="<?php if(isset($_GET["id"])) echo($plan->hora()) ?>"
							class="form-control"
							placeholder="10:00"
						/>
				</div>
			</div>
			
			<div class="col">
				<label for="id_5" class="form-label ">Actividad</label>
				<select name="id_5" id="id_5" class="form-select" aria-label="Default select example">
						
						
					
										<?php
										$favoritos = Usuario::get_favoritos_by_id($_SESSION["idUsuario"]);
										if($favoritos){?>
												<?php foreach($favoritos as $favorito){
													if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
														$icon = "<i class='fa-solid fa-landmark'></i>";
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Museo - ".$actividad->nombre()); ?></option> <?php
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Restaurante - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]);; ?>"><?php echo("Monumento - ".$actividad->nombre()); ?></option> <?php
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														?> <option value="<?php echo($favorito["id"]); ?>"><?php echo("Evento - ".$actividad->nombre()); ?></option> <?php
														}
													 } 
										}?>
										
																
				</select>						
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