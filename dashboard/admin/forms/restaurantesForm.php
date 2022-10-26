<!DOCTYPE html>
<form class="form mb-3 mt-md-2" method="POST" action="../api/museo.php">
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
						class="form-control"
						placeholder="nombre"
						required
					/>
				</div>
			</div>
            <div class="col">
				<div class="form-group">
                    <select class="form-select" for="categoria" aria-label="Default select example">
                        <option selected>Selecciona una categoria</option>
                        <option value="1">Musica</option>
                        <option value="2">Deportivo</option>
                        <option value="3">Three</option>
                    </select>
				</div>
			</div>
            <div class="col">
            <div class="form-group">
                    <select class="form-select" for="subcategoria" aria-label="Default select example">
                        <option selected>Selecciona una subcategoria</option>
                        <option value="1">Musica</option>
                        <option value="2">Deportivo</option>
                        <option value="3">Three</option>
                    </select>
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
		<div class="row justify-content-end">
			<div class="col-1">
				<button class="btn btn-primary" type="submit">Guardar</button>
			</div>
		</div>
	</div>
</form>