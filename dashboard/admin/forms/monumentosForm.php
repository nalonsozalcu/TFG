<!DOCTYPE html>
<form class="form mb-3 mt-md-2" method="POST" action="../api/monumento.php">
	<h5 class="mb-5">Formulario de monumentos</h5>
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
					<label for="fecha" class="form-label ">Año</label>
					<input
						type="text"
						id="fecha"
						name="fecha"
						class="form-control"
						placeholder="año"
						required
					/>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="autores" class="form-label ">Autores</label>
					<input
						type="text"
						id="autores"
						name="autores"
						class="form-control"
						placeholder="autores"
						required
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
			<div class="col">
				<div class="form-group">
					<label for="transporte" class="form-label ">Transporte</label>
					<input
						type="text"
						id="transporte"
						name="transporte"
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
			<div class="col">
				<div class="form-group">
					<label for="desc_sitio" class="form-label ">Descripción del lugar</label>
					<textarea class="form-control" id="desc_sitio" name="desc_sitio" rows="3"></textarea>
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