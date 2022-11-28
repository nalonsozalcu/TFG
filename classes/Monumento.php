<?php 

class Monumento
{
	private $id;
	private $nombre;
	private $descripcion;
	private $url;
	private $direccion;
	private $codpostal;
	private $latitud;
	private $longitud;
	private $fecha;
	private $autores;
	

	// ---> Constructor <---

	private function __construct(?int $id, string $nombre, string $descripcion, string $url,string $direccion, string $codpostal, string $latitud, string $longitud, string $fecha, string $autores)
	{
		$this->setId($id);
		$this->nombre = $nombre;
		$this->descripcion= $descripcion;
		$this->url = $url;
		$this->direccion = $direccion;
		$this->codpostal = $codpostal;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
		$this->fecha = $fecha;
		$this->autores = $autores;
		
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

	public function url() : string {
		return $this->url;
	}
	public function setUrl(string $url) : void {
		$this->url = $url;
	}

	public function direccion() : string {
		return $this->direccion;
	}
	public function setDireccion(string $direccion) : void {
		$this->direccion = $direccion;
	}

	public function codpostal() : string {
		return $this->codpostal;
	}
	public function setCodpostal(string $codpostal) : void {
		$this->codpostal = $codpostal;
	}

	public function latitud() : string {
		return $this->latitud;
	}
	public function setLatitud(string $latitud) : void {
		$this->latitud = $latitud;
	}

	public function longitud() : string {
		return $this->longitud;
	}
	public function setLongitud(string $longitud) : void {
		$this->longitud = $longitud;
	}

	public function fecha() : string {
		return $this->fecha;
	}
	public function setFecha(string $fecha) : void {
		$this->fecha = $fecha;
	}

	public function autores() : string {
		return $this->autores;
	}
	public function setAutores(string $autores) : void {
		$this->autores = $autores;
	}

	public static function get_monumento_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM monumentos WHERE monumentos.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			$fila = $rs->fetch_assoc();
			$monumento = new Monumento($fila['id'], $fila['nombre'], $fila['descripcion'], $fila['url'], $fila['direccion'], $fila['codpostal'], $fila['latitud'], $fila['longitud'], $fila['fecha'], $fila['autores']);
			$rs->free();

			return $monumento;
		}
		return false;
	}

	public static function get_all_monumentos_by_nombre($nombre){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM monumentos WHERE monumentos.nombre='%s'", $conn->real_escape_string($nombre));
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public static function get_all_monumentos(){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM monumentos");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public static function get_global_valoracion($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT valoracion FROM valoraciones_monumentos WHERE id_monumento=$id");
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
	
	public static function get_all_monumentos_by_categoria($nombre){
		$id = Monumento::get_id_by_categoria($nombre);
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM monumentos WHERE monumentos.id=
		(SELECT id_monumento
		 FROM relacion_categorias_monumentos 
		 WHERE ($id=relacion_categorias_monumentos.id_categoria) AND (monumentos.id=relacion_categorias_monumentos.id_monumento))");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public static function num_valoraciones($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM valoraciones_monumentos WHERE id_monumento=$id");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->num_rows;
		}
		return false;
	}

	public static function is_valoracion($id_actividad, $id_user)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT id FROM valoraciones_monumentos WHERE id_monumento='$id_actividad' AND id_usuario='$id_user'");
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
		$query = sprintf("SELECT valoracion FROM valoraciones_monumentos WHERE id='$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return $rs->fetch_assoc()["valoracion"];
			$rs->free();
		}
		return false;
	}

	public static function set_valoracion($id_actividad, $id_user, $valoracion){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("INSERT INTO `valoraciones_monumentos` (`id_monumento`, `id_usuario`, `valoracion`) VALUES ('$id_actividad', '$id_user', '$valoracion')");

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

		$query = sprintf("DELETE FROM valoraciones_monumentos WHERE id=$id");
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	private static function get_id_by_categoria($nombre) : int {
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT id FROM categorias_monumentos WHERE categorias_monumentos.categoria='%s'", $conn->real_escape_string($nombre));
		$rs = $conn->query($query);
		
		if ($rs && $rs->num_rows > 0) {
			$rt = $rs->fetch_all(MYSQLI_ASSOC);
			return (int)$rt[0]["id"];
		}  
		return false;
	}

	public static function is_tendencia($id_actividad)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT id FROM tendencias WHERE tipo_actividad='monumentos' AND id_actividad='$id_actividad'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return $rs->fetch_assoc()["id"];
			$rs->free();
		}
		return false;
	}
	
	// ---> Funciones para registrar, actualizar o borrar el Monumento <---

	public static function registrar($nombre,  $descripcion, $url, $direccion,  $codpostal, $latitud, $longitud,  $fecha,  $autores, $categorias, $form)
	{
		$conn = Aplicacion::getConexionBD();

		$nombre = $conn->real_escape_string($nombre);
		$descripcion = $conn->real_escape_string($descripcion);
		$url = $conn->real_escape_string($url);
		$direccion = $conn->real_escape_string($direccion);
		$codpostal = $conn->real_escape_string($codpostal);
		$latitud = $conn->real_escape_string($latitud);
		$longitud = $conn->real_escape_string($longitud);
		$fecha = $conn->real_escape_string($fecha);
		$autores = $conn->real_escape_string($autores);
		

		$query = sprintf("INSERT INTO `monumentos` (`id`, `nombre`, `descripcion`, `url`, `direccion`, `codpostal`, `latitud`, `longitud`, `fecha`, `autores`) VALUES (NULL, '$nombre', '$descripcion', '$url', '$direccion', '$codpostal', '$latitud', '$longitud', '$fecha', '$autores')");
		$result = $conn->query($query);
		if($result){
			$query = sprintf("SELECT MAX(`id`) FROM `monumentos`");
			$result = $conn->query($query);
			$id_monumento = $result->fetch_assoc()["MAX(`id`)"];
			if($form){
				if($categorias)
					foreach ($categorias as $valor){
						$query = sprintf("INSERT INTO `relacion_categorias_monumentos` (`id_categoria`, `id_monumento`) VALUES ($valor, '$id_monumento')");
						$result = $conn->query($query);
					}
			}else{
				if($categorias && $categorias !== ""){
					$categorias = explode(", ", $categorias);
					foreach ($categorias as $valor){
						if($valor && $valor != ""){
							$query = sprintf("SELECT Count(id) FROM `categorias_monumentos` WHERE `categoria` = '$valor'");
							$result = $conn->query($query);
							$cont = $result->fetch_assoc()["Count(id)"];
							if($cont == "0"){
								$query = sprintf("INSERT INTO `categorias_monumentos` (`categoria`) VALUES ('$valor')");
								$result = $conn->query($query);
							}
							$query = sprintf("SELECT `id` FROM `categorias_monumentos` WHERE `categoria` = '$valor'");
							$result = $conn->query($query);
							$id_categoria = $result->fetch_assoc()["id"];
							$query = sprintf("INSERT INTO `relacion_categorias_monumentos` (`id_categoria`, `id_monumento`) VALUES ('$id_categoria',  '$id_monumento')");
							$result = $conn->query($query);
						}
					}
				}
			}
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
		$escaped_descripcion = $conn->real_escape_string($this->descripcion);
		$escaped_url = $conn->real_escape_string($this->url);
		$escaped_direccion = $conn->real_escape_string($this->direccion);
		$escaped_codpostal = $conn->real_escape_string($this->codpostal);
		$escaped_latitud = $conn->real_escape_string($this->latitud);
		$escaped_longitud = $conn->real_escape_string($this->longitud);
		$escaped_fecha = $conn->real_escape_string($this->fecha);
		$escaped_autores = $conn->real_escape_string($this->autores);

		$query = sprintf("UPDATE monumentos SET id = '$escaped_id', nombre = '$escaped_nombre', descripcion = '$escaped_descripcion', url = '$escaped_url', direccion = '$escaped_direccion', codpostal = '$escaped_codpostal', latitud = '$escaped_latitud', longitud = '$escaped_longitud', fecha = '$escaped_fecha', autores = '$escaped_autores' WHERE id = $this->id");
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

		$query = sprintf("DELETE FROM monumentos WHERE monumentos.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}



}