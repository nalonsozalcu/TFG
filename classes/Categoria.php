<?php 

class Categoria
{
	private $id_actividad;
	private $id_categoria;
	private $tipo_actividad;
	private $tipo_categoria;
	
	// ---> Constructor <---

	private function __construct(int $id_actividad, int $id_categoria, string $tipo_actividad, string $tipo_categoria)
	{
		$this->id_actividad = $id_actividad;
		$this->id_categoria = $id_categoria;
		$this->tipo_actividad = $tipo_actividad;
		$this->tipo_categoria = $tipo_categoria;
		
	}

	// ---> Setter y Getters <---

	public function id_actividad() : int {
		return $this->id_actividad;
	}
	public function setId_actividad(int $id_actividad) : void {
		$this->id_actividad = $id_actividad;
	}

	public function id_categoria() : int {
		return $this->id_categoria;
	}
	public function setId_categoria(int $id_categoria) : void {
		$this->id_categoria = $id_categoria;
	}

	public function tipo_actividad() : string {
		return $this->tipo_actividad;
	}
	public function setTipo_actividad(string $tipo_actividad) : void {
		$this->tipo_actividad = $tipo_actividad;
	}

	public function tipo_categoria() : string {
		return $this->tipo_categoria;
	}
	public function setTipo_categoria(string $tipo_categoria) : void {
		$this->tipo_categoria = $tipo_categoria;
	}

	

	public static function get_all_categorias(){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM relacion_categorías");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public static function getCategoriabyId(int $id_categoria){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT tipo_categoria FROM relacion_categorías WHERE id_categoria = $this->id_categoria");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public static function getCategoriasByActividad(int $id_actividad){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT tipo_categoria FROM relacion_categorías WHERE id_actividad = $this->id_actividad");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	// ---> Funciones para registrar, actualizar o borrar las relaciones de categorias <---

	public static function registrar($id_actividad, $id_categoria, $tipo_actividad, $tipo_categoria)
	{
		$conn = Aplicacion::getConexionBD();

		$id_actividad = $conn->real_escape_string($id_actividad);
		$id_categoria = $conn->real_escape_string($id_categoria);
		$tipo_actividad = $conn->real_escape_string($tipo_actividad);
		$tipo_categoria = $conn->real_escape_string($tipo_categoria);

		$query = sprintf("INSERT INTO `relacion_categorías` (`id_actividad`, `id_categoria`, `tipo_actividad`, `tipo_categoria`) VALUES ('$id_actividad',  '$id_categoria',  '$tipo_actividad', '$tipo_categoria')");
		$result = $conn->query($query);
		
		if (!$result) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}
	public function update()
	{
		$conn = Aplicacion::getConexionBD();

		$escaped_id_actividad = $conn->real_escape_string($this->id_actividad);
		$escaped_id_categoria = $conn->real_escape_string($this->id_categoria);
		$escaped_tipo_actividad = $conn->real_escape_string($this->tipo_actividad);
		$escaped_tipo_categoria = $conn->real_escape_string($this->tipo_categoria);

		$query = sprintf("UPDATE relacion_categorías SET id_actividad = '$escaped_id_actividad', id_categoria = '$escaped_id_categoria', tipo_actividad = '$escaped_tipo_actividad', tipo_categoria = '$escaped_tipo_categoria' WHERE id_actividad = $this->id_actividad");
		$result = $conn->query($query);

		if (!$result)
		error_log($conn->error);
		else if ($conn->affected_rows != 1)
		error_log("Se han actualizado '$conn->affected_rows' !");

		return $result;
	}
	public static function delete_by_id_actividad($id_actividad)
	{
		$conn = Aplicacion::getConexionBD();

		$query = sprintf("DELETE FROM relacion_categorías WHERE relacion_categorías.id_actividad='%s'", $conn->real_escape_string($id_actividad));
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function delete_by_id_categoria($id_categoria)
	{
		$conn = Aplicacion::getConexionBD();

		$query = sprintf("DELETE FROM relacion_categorías WHERE relacion_categorías.id_categoria='%s'", $conn->real_escape_string($id_categoria));
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}



}