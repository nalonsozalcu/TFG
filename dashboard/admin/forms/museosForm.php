<!DOCTYPE html>
<?php 
if(isset($_GET["id"])){
	$id =  $_GET["id"];
	$museo = Museo::get_museo_by_id($id);
}else{
?>
<form class="form mb-3 mt-md-2" method="POST" action="../api/categoria.php?type=museos">
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
<form class="form mb-3 mt-md-2" method="POST" action="../api/museo.php?action=<?php echo(isset($_GET["id"]) ? "update&id=$id": "new")?>">
	<h5 class="mb-5">Formulario de museo</h5>
	<div class="container">
		<div class="row mb-3">
			<div class="col">
				<div class="form-group">
					<label for="nombre" class="form-label ">Nombre</label>
					<input
						type="text"
						id="nombre"
						name="nombre"
						value="<?php if(isset($_GET["id"])) echo($museo->nombre()) ?>"
						class="form-control"
						placeholder="nombre"
						required
					/>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="telefono" class="form-label ">Telefono</label>
					<input
						type="text"
						id="telefono"
						name="telefono"
						value="<?php if(isset($_GET["id"])) echo($museo->telefono()) ?>"
						class="form-control"
						placeholder="Telefono"
					/>
				</div>
			</div>
            <div class="col">
				<div class="form-group">
					<label for="inputEmail" class="form-label ">Email</label>
					<input
						type="text"
						id="inputEmail"
						name="email"
						value="<?php if(isset($_GET["id"])) echo($museo->email()) ?>"
						class="form-control"
						placeholder="ejemplo@gmail.com"
					/>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col">
				<div class="form-group">
					<label for="descripcion" class="form-label ">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php if(isset($_GET["id"])) echo($museo->descripcion()) ?></textarea>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col">
				<div class="form-group">
					<label for="horario" class="form-label ">Horario</label>
					<input
						type="text"
						id="horario"
						name="horario"
						value="<?php if(isset($_GET["id"])) echo($museo->horario()) ?>"
						class="form-control"
						placeholder="horario"
					/>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="transporte" class="form-label ">Transporte</label>
					<input
						type="text"
						id="transporte"
						name="transporte"
						value="<?php if(isset($_GET["id"])) echo($museo->transporte()) ?>"
						class="form-control"
						placeholder="transporte"
					/>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col">
				<div class="form-group">
					<label for="url" class="form-label ">URL</label>
					<input
						type="text"
						id="url"
						name="url"
						value="<?php if(isset($_GET["id"])) echo($museo->url()) ?>"
						class="form-control"
						placeholder="url"
					/>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-6">
				<div class="form-group">
					<label for="direccion" class="form-label ">Dirección</label>
					<input
						type="text"
						id="direccion"
						name="direccion"
						value="<?php if(isset($_GET["id"])) echo($museo->direccion()) ?>"
						class="form-control"
						placeholder="direccion"
						required
					/>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="codpostal" class="form-label ">Codigo postal</label>
					<input
						type="text"
						id="codpostal"
						name="codpostal"
						value="<?php if(isset($_GET["id"])) echo($museo->codpostal()) ?>"
						class="form-control"
						placeholder="09400"

					/>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="latitud" class="form-label ">Latitud</label>
					<input
						type="text"
						id="latitud"
						name="latitud"
						value="<?php if(isset($_GET["id"])) echo($museo->latitud()) ?>"
						class="form-control"
						placeholder="38.889722"
					/>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="longitud" class="form-label ">Longitud</label>
					<input
						type="text"
						id="longitud"
						name="longitud"
						value="<?php if(isset($_GET["id"])) echo($museo->longitud()) ?>"
						class="form-control"
						placeholder="-38.889722"
					/>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-6">
				<div class="form-group">
					<label for="desc_sitio" class="form-label ">Descripción del lugar</label>
					<textarea class="form-control" id="desc_sitio" name="desc_sitio" rows="3"><?php if(isset($_GET["id"])) echo($museo->desc_sitio()) ?></textarea>
				</div>
			</div>
			<div class="col-4">
			<?php
				$conn = Aplicacion::getConexionBD();
				$query = sprintf("SELECT * FROM categorias_museos");
				$rs = $conn->query($query);
				$categorias = $rs->fetch_all(MYSQLI_ASSOC);?>
				<div class="form-group">
					<label for="categoria" class="form-label ">Selecciona las categorias</label>
					<select class="form-control selectpicker" name="categoria[]" multiple data-live-search="true">
					<?php foreach ($categorias as $i => $value):?>
						<option value="<?php echo($categorias[$i]["id"])?>"><?php echo($categorias[$i]["categoria"])?></option>
					<?php endforeach; ?>
					</select>
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