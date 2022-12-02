<?php 

class Plan
{
	private $id;
	private $nombre;
	private $fecha;

	// ---> Constructor <---

	private function __construct(?int $id, string $nombre, string $fecha)
	{
		$this->setId($id);
		$this->nombre = $nombre;
		$this->fecha = $fecha;
		
	}

	// ---> Setter y Getters <---

	public function id() : ?int {
		return $this->id;
	}

	public function setId(int $id) {
		if ($this->id)
			throw new \RuntimeException("This user already has an id");
		$this->id = $id;
	}

	public function nombre() : string {
		return $this->nombre;
	}
	public function setNombre(string $nombre) : void {
		$this->nombre = $nombre;
	}

	public function fecha() : string {
		return $this->fecha;
	}
	public function setFecha(string $fecha) : void {
		$this->fecha = $fecha;
	}

	public static function get_plan_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM planes WHERE planes.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			$fila = $rs->fetch_assoc();
			$plan = new Plan($fila['id'], $fila['nombre'], $fila['fecha']);
			$rs->free();

			return $plan;
		}
		return false;
	}


	public static function get_all_planes(){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM planes");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public static function get_global_valoracion($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT valoracion FROM valoraciones_planes WHERE id_plan=$id");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			$valoraciones = $rs->fetch_all(MYSQLI_ASSOC);
			$suma = 0;
			$total = sizeof($valoraciones);
			foreach($valoraciones as $val){
				$suma +=  $val['valoracion'];
			}
			return  round($suma / $total, 2);
		}
		return false;
	}

	public static function num_valoraciones($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM valoraciones_planes WHERE id_plan=$id");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->num_rows;
		}
		return false;
	}

	public static function is_valoracion($id_plan, $id_user)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT id FROM valoraciones_planes WHERE id_plan='$id_plan' AND id_usuario='$id_user'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return $rs->fetch_assoc()["id"];
			$rs->free();
		}
		return false;
	}
	public static function get_valoracion($id)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT valoracion FROM valoraciones_planes WHERE id='$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return $rs->fetch_assoc()["valoracion"];
			$rs->free();
		}
		return false;
	}

	public static function set_valoracion($id_plan, $id_user, $valoracion){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("INSERT INTO `valoraciones_planes` (`id_plan`, `id_usuario`, `valoracion`) VALUES ('$id_plan', '$id_user', '$valoracion')");

		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return true;
		}
		return false;
	}

	public static function delete_valoracion($id)
	{
		$conn = Aplicacion::getConexionBD();

		$id = $conn->real_escape_string($id);

		$query = sprintf("DELETE FROM valoraciones_planes WHERE id=$id");
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function is_tendencia($id_plan)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT id FROM tendencias WHERE tipo_actividad='planes' AND id_actividad='$id_plan'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return $rs->fetch_assoc()["id"];
			$rs->free();
		}
		return false;
	}
	
	// ---> Funciones para registrar, actualizar o borrar el Plan <---

	public static function registrar($nombre, $fecha)
	{
		$conn = Aplicacion::getConexionBD();

		$nombre = $conn->real_escape_string($nombre);
		$fecha = $conn->real_escape_string($fecha);
	
		$query = sprintf("INSERT INTO `planes` (`id`, `nombre`, `fecha`) VALUES (NULL, '$nombre', '$fecha')");
		$result = $conn->query($query);
		if($result){
			$query = sprintf("SELECT MAX(`id`) FROM `planes`");
			$result = $conn->query($query);
			$id_plan = $result->fetch_assoc()["MAX(`id`)"];
	
		}
		if (!$result) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}
	public function update()
	{
		$conn = Aplicacion::getConexionBD();

		$escaped_id = $conn->real_escape_string($this->id);
		$escaped_nombre = $conn->real_escape_string($this->nombre);
		$escaped_fecha = $conn->real_escape_string($this->fecha);

		$query = sprintf("UPDATE planes SET id = '$escaped_id', nombre = '$escaped_nombre', fecha = '$escaped_fecha' WHERE id = $this->id");
		$result = $conn->query($query);

		if (!$result)
		error_log($conn->error);
		else if ($conn->affected_rows != 1)
		error_log("Se han actualizado '$conn->affected_rows' !");

		return $result;
	}
	public static function delete_by_id($id)
	{
		$conn = Aplicacion::getConexionBD();

		$query = sprintf("DELETE FROM planes WHERE planes.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}



}