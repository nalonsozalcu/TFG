<!DOCTYPE html>
<div class="container">
	<div class="row mb-3">
		<h5 class="mb-3">Añadir categorías</h5>
		<form class="form col-4" method="POST" action="../api/categoria.php?type=restaurantes">
			<div class="row">
				<div class="col-10">
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
		</form>
		<form class="form col-4" method="POST" action="../api/categoria.php?type=restaurantes">
			<div class="row">
				<div class="col-10">
					<div class="form-group">
						<label for="subcategoria" class="form-label ">Subcategoría</label>
						<input
							type="text"
							id="subcategoria"
							name="subcategoria"
							class="form-control"
							placeholder="subcategoria"
							required
						/>
					</div>
				</div>
				<div class="col-2 align-self-end">
					<button class="btn btn-primary" type="submit"><i class="bi bi-plus"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>
<form class="form mb-3 mt-md-2" method="POST" action="../api/restaurante.php">
	<h5 class="mb-5">Formulario de restaurante</h5>
	<div class="container">
		<div class="row mb-3">
			<div class="col">
				<div class="form-group">
					<label for="nombre" class="form-label ">Nombre</label>
					<input
						type="text"
						id="nombre"
						name="nombre"
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
					<textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
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
						class="form-control"
						placeholder="horario"
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
						class="form-control"
						placeholder="-38.889722"
					/>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-4">
			<?php
				$conn = Aplicacion::getConexionBD();
				$query = sprintf("SELECT * FROM categorias_restaurantes");
				$rs = $conn->query($query);
				$categorias = $rs->fetch_all(MYSQLI_ASSOC);?>
				<div class="form-group">
					<label for="categoria" class="form-label ">Selecciona las categorias</label>
					<select class="form-control selectpicker" name="categoria" multiple data-live-search="true">
					<?php foreach ($categorias as $i => $value):?>
						<option value="<?php echo($categorias[$i]["id"])?>"><?php echo($categorias[$i]["categoria"])?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="col-4">
			<?php
				$conn = Aplicacion::getConexionBD();
				$query = sprintf("SELECT * FROM subcategorias_restaurantes");
				$rs = $conn->query($query);
				$subcategoria = $rs->fetch_all(MYSQLI_ASSOC);?>
				<div class="form-group">
					<label for="subcategoria" class="form-label ">Selecciona la subcategoria</label>
					<select class="form-control selectpicker" name="subcategoria" multiple data-live-search="true">
					<?php foreach ($subcategoria as $i => $value):?>
						<option value="<?php echo($subcategoria[$i]["id"])?>"><?php echo($subcategoria[$i]["subcategoria"])?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-1">
				<button class="btn btn-primary" type="submit">Guardar</button>
			</div>
		</div>
	</div>
</form>