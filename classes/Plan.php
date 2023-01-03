<?php 

class Plan
{
	private $id;
	private $nombre;
	private $descripcion;
	private $hora_act_1;
	private $id_act_1;
	private $tipo_act_1;
	private $hora_act_2;
	private $id_act_2;
	private $tipo_act_2;
	private $hora_act_3;
	private $id_act_3;
	private $tipo_act_3;
	private $hora_act_4;
	private $id_act_4;
	private $tipo_act_4;
	private $hora_act_5;
	private $id_act_5;
	private $tipo_act_5;
	private $fecha;

	// ---> Constructor <---

	private function __construct(?int $id, string $nombre, string $descripcion, string $hora_act_1, string $id_act_1 , string $tipo_act_1, string $hora_act_2, string $id_act_2 , string $tipo_act_2, string $hora_act_3, string $id_act_3 ,  string $tipo_act_3, string $hora_act_4, string $id_act_4 ,  string $tipo_act_4, string $hora_act_5, string $id_act_5,  string $tipo_act_5, string $fecha)
	{
		$this->setId($id);
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->hora_act_1 = $hora_act_1;
		$this->id_act_1 = $id_act_1;
		$this->tipo_act_1 = $tipo_act_1;
		$this->hora_act_2 = $hora_act_2;
		$this->id_act_2 = $id_act_2;
		$this->tipo_act_2 = $tipo_act_2;
		$this->hora_act_3 = $hora_act_3;
		$this->id_act_3 = $id_act_3;
		$this->tipo_act_3 = $tipo_act_3;
		$this->hora_act_4 = $hora_act_4;
		$this->id_act_4 = $id_act_4;
		$this->tipo_act_4 = $tipo_act_4;
		$this->hora_act_5 = $hora_act_5;
		$this->id_act_5 = $id_act_5;
		$this->tipo_act_5 = $tipo_act_5;
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

	public function descripcion() : string {
		return $this->descripcion;
	}
	public function setDescripcion(string $descripcion) : void {
		$this->descripcion = $descripcion;
	}

	public function hora_act_1() : string {
		return $this->hora_act_1;
	}
	public function setHora_act_1(string $hora_act_1) : void {
		$this->hora_act_1 = $hora_act_1;
	}

	public function id_act_1() : string {
		return $this->id_act_1;
	}
	public function setId_act_1(string $id_act_1) : void {
		$this->id_act_1 = $id_act_1;
	}

	public function tipo_act_1() : string {
		return $this->tipo_act_1;
	}
	public function setTipo_act_1(string $tipo_act_1) : void {
		$this->tipo_act_1 = $tipo_act_1;
	}

	public function hora_act_2() : string {
		return $this->hora_act_2;
	}
	public function setHora_act_2(string $hora_act_2) : void {
		$this->hora_act_2 = $hora_act_2;
	}

	public function id_act_2() : string {
		return $this->id_act_2;
	}
	public function setId_act_2(string $id_act_2) : void {
		$this->id_act_2 = $id_act_2;
	}

	public function tipo_act_2() : string {
		return $this->tipo_act_2;
	}
	public function setTipo_act_2(string $tipo_act_2) : void {
		$this->tipo_act_2 = $tipo_act_2;
	}

	public function hora_act_3() : string {
		return $this->hora_act_3;
	}
	public function setHora_act_3(string $hora_act_3) : void {
		$this->hora_act_3 = $hora_act_3;
	}

	public function id_act_3() : string {
		return $this->id_act_3;
	}
	public function setId_act_3(string $id_act_3) : void {
		$this->id_act_3= $id_act_3;
	}

	public function tipo_act_3() : string {
		return $this->tipo_act_3;
	}
	public function setTipo_act_3(string $tipo_act_3) : void {
		$this->tipo_act_3 = $tipo_act_3;
	}

	public function hora_act_4() : string {
		return $this->hora_act_4;
	}
	public function setHora_act_4(string $hora_act_4) : void {
		$this->hora_act_4 = $hora_act_4;
	}

	public function id_act_4() : string {
		return $this->id_act_4;
	}
	public function setId_act_4(string $id_act_4) : void {
		$this->id_act_4= $id_act_4;
	}

	public function tipo_act_4() : string {
		return $this->tipo_act_4;
	}
	public function setTipo_act_4(string $tipo_act_4) : void {
		$this->tipo_act_4 = $tipo_act_4;
	}

	public function hora_act_5() : string {
		return $this->hora_act_5;
	}
	public function setHora_act_5(string $hora_act_5) : void {
		$this->hora_act_5 = $hora_act_5;
	}

	public function id_act_5() : string {
		return $this->id_act_5;
	}
	public function setId_act_5(string $id_act_5) : void {
		$this->id_act_5 = $id_act_5;
	}

	public function tipo_act_5() : string {
		return $this->tipo_act_5;
	}
	public function setTipo_act_5(string $tipo_act_5) : void {
		$this->tipo_act_5 = $tipo_act_5;
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
			$plan = new Plan($fila['id'], $fila['nombre'], $fila['descripcion'], $fila['hora_act_1'], $fila['id_act_1'] ,  $fila['tipo_act_1'] , $fila['hora_act_2'], $fila['id_act_2'] , $fila['tipo_act_2'] , $fila['hora_act_3'], $fila['id_act_3'] ,  $fila['tipo_act_3'] , $fila['hora_act_4'], $fila['id_act_4'],  $fila['tipo_act_4'] , $fila['hora_act_5'], $fila['id_act_5'],  $fila['tipo_act_5'] , $fila['fecha']);
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

	public static function registrar($nombre, $descripcion, $hora_act_1, $id_act_1 , $tipo_act_1 , $hora_act_2, $id_act_2 , $tipo_act_2 , $hora_act_3, $id_act_3 , $tipo_act_3 , $hora_act_4, $id_act_4 , $tipo_act_4 , $hora_act_5, $id_act_5, $tipo_act_5 , $fecha)
	{
		$conn = Aplicacion::getConexionBD();

		$nombre = $conn->real_escape_string($nombre);
		$descripcion = $conn->real_escape_string($descripcion);
		$hora_act_1 = $conn->real_escape_string($hora_act_1);
		$id_act_1 = $conn->real_escape_string($id_act_1);
		$tipo_act_1 = $conn->real_escape_string($tipo_act_1);
		$hora_act_2 = $conn->real_escape_string($hora_act_2);
		$id_act_2 = $conn->real_escape_string($id_act_2);
		$tipo_act_2 = $conn->real_escape_string($tipo_act_2);
		$hora_act_3 = $conn->real_escape_string($hora_act_3);
		$id_act_3 = $conn->real_escape_string($id_act_3);
		$tipo_act_3 = $conn->real_escape_string($tipo_act_3);
		$hora_act_4 = $conn->real_escape_string($hora_act_4);
		$id_act_4 = $conn->real_escape_string($id_act_4);
		$tipo_act_4 = $conn->real_escape_string($tipo_act_4);
		$hora_act_5 = $conn->real_escape_string($hora_act_5);
		$id_act_5 = $conn->real_escape_string($id_act_5);
		$tipo_act_5 = $conn->real_escape_string($tipo_act_5);
		$fecha = $conn->real_escape_string($fecha);
	
		$query = sprintf("INSERT INTO `planes` (`id`, `nombre`, `descripcion`, `hora_act_1`, `id_act_1`, `tipo_act_1`, `hora_act_2`, `id_act_2`, `tipo_act_2`, `hora_act_3`, `id_act_3`,  `tipo_act_3`, `hora_act_4`, `id_act_4`, `tipo_act_4`, `hora_act_5`, `id_act_5`, `tipo_act_5`, `fecha`) VALUES (NULL, '$nombre', '$descripcion', '$hora_act_1', '$id_act_1', '$tipo_act_1', '$hora_act_2', '$id_act_2', '$tipo_act_2', '$hora_act_3', '$id_act_3', '$tipo_act_3', '$hora_act_4', '$id_act_4', '$tipo_act_4', '$hora_act_5', '$id_act_5', '$tipo_act_5', '$fecha')");
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
		} else return $id_plan;
	}
	public function update()
	{
		$conn = Aplicacion::getConexionBD();

		$escaped_id = $conn->real_escape_string($this->id);
		$escaped_nombre = $conn->real_escape_string($this->nombre);
		$escaped_descripcion = $conn->real_escape_string($this->descripcion);
		$escaped_hora_act_1 = $conn->real_escape_string($this->hora_act_1);
		$escaped_id_act_1 = $conn->real_escape_string($this->id_act_1);
		$escaped_tipo_act_1 = $conn->real_escape_string($this->tipo_act_1);
		$escaped_hora_act_2 = $conn->real_escape_string($this->hora_act_2);
		$escaped_id_act_2 = $conn->real_escape_string($this->id_act_2);
		$escaped_tipo_act_2 = $conn->real_escape_string($this->tipo_act_2);
		$escaped_hora_act_3 = $conn->real_escape_string($this->hora_act_3);
		$escaped_id_act_3 = $conn->real_escape_string($this->id_act_3);
		$escaped_tipo_act_3 = $conn->real_escape_string($this->tipo_act_3);
		$escaped_hora_act_4 = $conn->real_escape_string($this->hora_act_4);
		$escaped_id_act_4 = $conn->real_escape_string($this->id_act_4);
		$escaped_tipo_act_4 = $conn->real_escape_string($this->tipo_act_4);
		$escaped_hora_act_5 = $conn->real_escape_string($this->hora_act_5);
		$escaped_id_act_5 = $conn->real_escape_string($this->id_act_5);
		$escaped_tipo_act_5 = $conn->real_escape_string($this->tipo_act_5);
		$escaped_fecha = $conn->real_escape_string($this->fecha);

		$query = sprintf("UPDATE planes SET id = '$escaped_id', nombre = '$escaped_nombre', descripcion = '$escaped_descripcion', hora_act_1 = '$escaped_hora_act_1', id_act_1 = '$escaped_id_act_1', tipo_act_1 = '$escaped_tipo_act_1', hora_act_2 = '$escaped_hora_act_2', id_act_2 = '$escaped_id_act_2', tipo_act_2 = '$escaped_tipo_act_2', hora_act_3 = '$escaped_hora_act_3', id_act_3 = '$escaped_id_act_3', tipo_act_3 = '$escaped_tipo_act_3', hora_act_4 = '$escaped_hora_act_4', id_act_4 = '$escaped_id_act_4', tipo_act_4 = '$escaped_tipo_act_4', hora_act_5 = '$escaped_hora_act_5', id_act_5 = '$escaped_id_act_5', tipo_act_5 = '$escaped_tipo_act_5', fecha = '$escaped_fecha' WHERE id = $this->id");
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