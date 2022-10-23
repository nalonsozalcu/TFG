<?php 

class Museo
{
	private $id;
	private $nombre;
	private $descripcion;
	private $desc_sitio;
	private $horario;
	private $transporte;
	private $url;
	private $direccion;
	private $codpostal;
	private $latitud;
	private $longitud;
	private $telefono;
	private $email;
	

	// ---> Constructor <---

	private function __construct(?int $id, string $nombre, string $descripcion, string $desc_sitio, string $horario, string $transporte, string $url,string $direccion, string $codpostal, string $latitud, string $longitud, string $telefono, string $email)
	{
		$this->setId($id);
		$this->nombre = $nombre;
		$this->descripcion= $descripcion;
		$this->desc_sitio= $desc_sitio;
		$this->horario= $horario;
		$this->transporte = $transporte;
		$this->url = $url;
		$this->direccion = $direccion;
		$this->codpostal = $codpostal;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
		$this->telefono = $telefono;
		$this->email = $email;
		
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

	public function desc_sitio() : string {
		return $this->desc_sitio;
	}
	public function setDesc_sitio(string $desc_sitio) : void {
		$this->desc_sitio = $desc_sitio;
	}

	public function horario() : string {
		return $this->horario;
	}
	public function setHorario(string $horario) : void {
		$this->horario = $horario;
	}

	public function transporte() : string {
		return $this->transporte;
	}
	public function setTransporte(string $transporte) : void {
		$this->transporte = $transporte;
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

	public function telefono() : string {
		return $this->telefono;
	}
	public function setTelefono(string $telefono) : void {
		$this->telefono = $telefono;
	}

	public function email() : string {
		return $this->email;
	}
	public function setEmail(string $email) : void {
		$this->email = $email;
	}

	// ---> Funciones para registrar, actualizar o borrar el museo <---

	public static function registrar($id,  $nombre,  $descripcion, $desc_sitio,  $horario,  $transporte,  $url, $direccion,  $codpostal,  $telefono,  $email)
	{
		$conn = Aplicacion::getConexionBD();

		$id = $conn->real_escape_string($id);
		$nombre = $conn->real_escape_string($nombre);
		$descripcion = $conn->real_escape_string($descripcion);
		$desc_sitio = $conn->real_escape_string($desc_sitio);
		$horario = $conn->real_escape_string($horario);
		$transporte = $conn->real_escape_string($transporte);
		$url = $conn->real_escape_string($url);
		$direccion = $conn->real_escape_string($direccion);
		$codpostal = $conn->real_escape_string($codpostal);
		$latitud = $conn->real_escape_string($latitud);
		$longitud = $conn->real_escape_string($longitud);
		$telefono = $conn->real_escape_string($telefono);
		$email = $conn->real_escape_string($email);

		$query = sprintf("INSERT INTO `museos` (`id`, `nombre`, `descripcion`, `desc_sitio`, `horario`, `transporte`, `url`, `direccion`, `codpostal`, `latitud`, `longitud`, `telefono`, `email`) VALUES ('$id',  '$nombre',  '$descripcion', '$desc_sitio', '$horario',  '$transporte',  '$url', '$direccion',  '$codpostal', '$latitud', '$longitud', '$telefono',  '$email')");
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

		$escaped_id = $conn->real_escape_string($this->id);
		$escaped_nombre = $conn->real_escape_string($this->nombre);
		$escaped_descripcion = $conn->real_escape_string($this->descripcion);
		$escaped_desc_sitio = $conn->real_escape_string($this->desc_sitio);
		$escaped_horario = $conn->real_escape_string($this->horario);
		$escaped_transporte = $conn->real_escape_string($this->transporte);
		$escaped_url = $conn->real_escape_string($this->url);
		$escaped_direccion = $conn->real_escape_string($this->direccion);
		$escaped_codpostal = $conn->real_escape_string($this->codpostal);
		$escaped_latitud = $conn->real_escape_string($this->latitud);
		$escaped_longitud = $conn->real_escape_string($this->longitud);
		$escaped_telefono = $conn->real_escape_string($this->telefono);
		$escaped_email = $conn->real_escape_string($this->email);

		$query = sprintf("UPDATE museos SET id = '$escaped_id', nombre = '$escaped_nombre', descripcion = '$escaped_descripcion', desc_sitio = '$escaped_desc_sitio', horario = '$escaped_horario', transporte = '$escaped_transporte', url = '$escaped_url', direccion = '$escaped_direccion', codpostal = '$escaped_codpostal', latitud = '$escaped_latitud', longitud = '$escaped_longitud', telefono = '$escaped_telefono', email = '$escaped_email' WHERE id = $this->id");
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

		$query = sprintf("DELETE FROM museos WHERE museos.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}



}