<?php 

class Evento
{
	private $id;
	private $nombre;
	private $descripcion;
	private $precio;
	private $gratis;
	private $dias;
	private $dias_ex;
	private $fecha_ini;
	private $fecha_fin;
	private $hora;
	private $url;
	private $lugar;
	private $direccion;
	private $codpostal;
	private $latitud;
	private $longitud;

	// ---> Constructor <---

	private function __construct(?int $id, string $nombre, string $descripcion, string $precio, int $gratis, string $dias, string $dias_ex, date $fecha_ini, date $fecha_fin, string $hora, string $url, string $lugar, string $direccion, string $codpostal, string $latitud, string $longitud)
	{
		$this->setId($id);
		$this->nombre = $nombre;
		$this->descripcion= $descripcion;
		$this->precio = $precio;
		$this->gratis = $gratis;
		$this->dias = $dias;
		$this->dias_ex = $dias_ex;
		$this->fecha_ini = $fecha_ini;
		$this->fecha_fin = $fecha_fin;
		$this->hora= $hora;
		$this->url = $url;
		$this->lugar = $lugar;
		$this->direccion = $direccion;
		$this->codpostal = $codpostal;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
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

	public function hora() : string {
		return $this->hora;
	}
	public function setHora(string $hora) : void {
		$this->hora = $hora;
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

	public function fecha_fin() : date {
		return $this->fecha_fin;
	}
	public function setFecha_fin(date $fecha_fin) : void {
		$this->fecha_fin = $fecha_fin;
	}

	public function fecha_ini() : date {
		return $this->fecha_ini;
	}
	public function setFecha_ini(date $fecha_ini) : void {
		$this->fecha_ini = $fecha_ini;
	}

	public function gratis() : int {
		return $this->gratis;
	}
	public function setGratis(int $gratis) : void {
		$this->gratis = $gratis;
	}
	
	public function dias() : string {
		return $this->dias;
	}
	public function setDias(string $dias) : void {
		$this->dias = $dias;
	}

	public function dias_ex() : string {
		return $this->dias_ex;
	}
	public function setDias_ex(string $dias_ex) : void {
		$this->dias_ex = $dias_ex;
	}

	public function lugar() : string {
		return $this->lugar;
	}
	public function setLugar(string $lugar) : void {
		$this->lugar = $lugar;
	}

	public function precio() : string {
		return $this->precio;
	}
	public function setPrecio(string $precio) : void {
		$this->precio = $precio;
	}

	public static function get_all_eventos(){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM eventos");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	// ---> Funciones para registrar, actualizar o borrar el museo <---

	public static function registrar($nombre, $descripcion, $precio, $gratis, $dias, $dias_ex, $fecha_ini, $fecha_fin, $hora, $url, $lugar, $direccion, $codpostal, $latitud, $longitud, $categorias, $audiencias, $form)
	{
		$conn = Aplicacion::getConexionBD();

		$nombre = $conn->real_escape_string($nombre);
		$descripcion = $conn->real_escape_string($descripcion);
		$hora = $conn->real_escape_string($hora);
		$url = $conn->real_escape_string($url);
		$direccion = $conn->real_escape_string($direccion);
		$codpostal = $conn->real_escape_string($codpostal);
		$latitud = $conn->real_escape_string($latitud);
		$longitud = $conn->real_escape_string($longitud);
		$fecha_fin = $conn->real_escape_string($fecha_fin);
		$fecha_ini = $conn->real_escape_string($fecha_ini);
		$gratis = $conn->real_escape_string($gratis);
		$dias = $conn->real_escape_string($dias);
		$dias_ex = $conn->real_escape_string($dias_ex);
		$lugar = $conn->real_escape_string($lugar);
		$precio = $conn->real_escape_string($precio);

		$query = sprintf("INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `hora`, `url`, `direccion`, `codpostal`, `latitud`, `longitud`, `fecha_fin`, `fecha_ini`, `gratis`, `dias`, `dias_ex`, `lugar`, `precio`) VALUES (NULL,  '$nombre',  '$descripcion', '$hora',  '$url', '$direccion',  '$codpostal', '$latitud', '$longitud', '$fecha_fin', '$fecha_fin', '$gratis', '$dias',  '$dias_ex',  '$lugar', '$precio')");
		$result = $conn->query($query);
		if($result){
			$query = sprintf("SELECT MAX(`id`) FROM `eventos`");
			$result = $conn->query($query);
			$id_evento = $result->fetch_assoc()["MAX(`id`)"];
			if($form){
				if($categorias)
					foreach ($categorias as $valor){
						$query = sprintf("INSERT INTO `relacion_categorias_eventos` (`id_categoria`, `id_evento`) VALUES ($valor, '$id_evento')");
						$result = $conn->query($query);
					}
				if($audiencias)
					foreach ($audiencias as $valor){
						$query = sprintf("INSERT INTO `relacion_audiencia_eventos` (`id_audiencia`, `id_evento`) VALUES ($valor,  '$id_evento')");
						$result = $conn->query($query);
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
		$escaped_hora = $conn->real_escape_string($this->hora);
		$escaped_url = $conn->real_escape_string($this->url);
		$escaped_direccion = $conn->real_escape_string($this->direccion);
		$escaped_codpostal = $conn->real_escape_string($this->codpostal);
		$escaped_latitud = $conn->real_escape_string($this->latitud);
		$escaped_longitud = $conn->real_escape_string($this->longitud);
		$escaped_fecha_fin = $conn->real_escape_string($this->fecha_fin);
		$escaped_fecha_ini = $conn->real_escape_string($this->fecha_ini);
		$escaped_gratis = $conn->real_escape_string($this->gratis);
		$escaped_dias = $conn->real_escape_string($this->dias);
		$escaped_dias_ex = $conn->real_escape_string($this->dias_ex);
		$escaped_lugar = $conn->real_escape_string($this->lugar);
		$escaped_precio = $conn->real_escape_string($this->precio);

		$query = sprintf("UPDATE eventos SET id = '$escaped_id', nombre = '$escaped_nombre', descripcion = '$escaped_descripcion', hora = '$escaped_hora', url = '$escaped_url', direccion = '$escaped_direccion', codpostal = '$escaped_codpostal', latitud = '$escaped_latitud', longitud = '$escaped_longitud', fecha_fin = '$escaped_fecha_fin', fecha_ini = '$escaped_fecha_ini', gratis = '$escaped_gratis', dias = '$escaped_dias', dias_ex = '$escaped_dias_ex', lugar = '$escaped_lugar', precio = '$escaped_precio' WHERE id = $this->id");
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

		$query = sprintf("DELETE FROM eventos WHERE eventos.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}



}