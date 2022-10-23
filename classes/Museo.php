<?php 

class Museo
{
	private const TABLE = 'museos';
	private $id;
	private $nombre;
	private $descripcion;
	private $horario;
	private $transporte;
	private $url;
	private $localidad;
	private $codpostal;
	private $telefono;
	private $email;

	// ---> Constructor <---

	private function __construct(?int $id, string $nombre, string $descripcion, string $horario, string $transporte, string $url,string $localidad, string $codpostal, string $telefono, string $email)
	{
		$this->setId($id);
		$this->nombre = $nombre;
		$this->descripcion= $descripcion;
		$this->horario= $horario;
		$this->transporte = $transporte;
		$this->url = $url;
		$this->localidad = $localidad;
		$this->codpostal = $codpostal;
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

	public function localidad() : string {
		return $this->localidad;
	}
	public function setLocalidad(string $localidad) : void {
		$this->localidad = $localidad;
	}

	public function codpostal() : string {
		return $this->codpostal;
	}
	public function setCodpostal(string $codpostal) : void {
		$this->codpostal = $codpostal;
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

	public static function registrar($id,  $nombre,  $descripcion,  $horario,  $transporte,  $url, $localidad,  $codpostal,  $telefono,  $email)
	{
		$conn = Aplicacion::getConexionBD();

		$id = $conn->real_escape_string($id);
		$nombre = $conn->real_escape_string($nombre);
		$descripcion = $conn->real_escape_string($descripcion);
		$horario = $conn->real_escape_string($horario);
		$transporte = $conn->real_escape_string($transporte);
		$url = $conn->real_escape_string($url);
		$localidad = $conn->real_escape_string($localidad);
		$codpostal = $conn->real_escape_string($codpostal);
		$telefono = $conn->real_escape_string($telefono);
		$email = $conn->real_escape_string($email);

		$query = sprintf("INSERT INTO `museos` (`id`, `nombre`, `descripcion`, `horario`, `transporte`, `url`, `localidad`, `codpostal`, `telefono`, `email`) VALUES ('$id',  '$nombre',  '$descripcion',  '$horario',  '$transporte',  '$url', '$localidad',  '$codpostal',  '$telefono',  '$email')");
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
		$escaped_horario = $conn->real_escape_string($this->horario);
		$escaped_transporte = $conn->real_escape_string($this->transporte);
		$escaped_url = $conn->real_escape_string($this->url);
		$escaped_localidad = $conn->real_escape_string($this->localidad);
		$escaped_codpostal = $conn->real_escape_string($this->codpostal);
		$escaped_telefono = $conn->real_escape_string($this->telefono);
		$escaped_email = $conn->real_escape_string($this->email);

		$query = sprintf("UPDATE museos SET id = '$escaped_id', nombre = '$escaped_nombre', descripcion = '$escaped_descripcion', horario = '$escaped_horario', transporte = '$escaped_transporte', url = '$escaped_url', localidad = '$escaped_localidad', codpostal = '$escaped_codpostal', telefono = '$escaped_telefono', email = '$escaped_email', WHERE id = $this->id");
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