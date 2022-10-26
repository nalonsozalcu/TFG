<?php 

class Restaurante
{
	private $id;
	private $nombre;
	private $descripcion;
	private $horario;
	private $url;
	private $direccion;
	private $codpostal;
	private $latitud;
	private $longitud;
	private $telefono;
	private $email;
	private $categoria;
	private $subcategoria;
	

	// ---> Constructor <---

	private function __construct(?int $id, string $nombre, string $descripcion, string $horario, string $url,string $direccion, string $codpostal, string $latitud, string $longitud, string $telefono, string $email, string $categoria, string $subcategoria)
	{
		$this->setId($id);
		$this->nombre = $nombre;
		$this->descripcion= $descripcion;
		$this->horario= $horario;
		$this->url = $url;
		$this->direccion = $direccion;
		$this->codpostal = $codpostal;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
		$this->telefono = $telefono;
		$this->email = $email;
		$this->categoria = $categoria;
		$this->subcategoria = $subcategoria;
		
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

	public function categoria() : string {
		return $this->categoria;
	}
	public function setCategoria(string $categoria) : void {
		$this->categoria = $categoria;
	}

	public function subcategoria() : string {
		return $this->subcategoria;
	}
	public function setSubcategoria(string $subcategoria) : void {
		$this->subcategoria = $subcategoria;
	}

	public static function get_all_restaurantes(){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM restaurantes");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	// ---> Funciones para registrar, actualizar o borrar el museo <---

	public static function registrar($nombre,  $descripcion,  $horario,  $url, $direccion,  $codpostal,  $latitud,  $longitud,  $telefono,  $email, $categoria, $subcategoria)
	{
		$conn = Aplicacion::getConexionBD();

		$nombre = $conn->real_escape_string($nombre);
		$descripcion = $conn->real_escape_string($descripcion);
		$horario = $conn->real_escape_string($horario);
		$url = $conn->real_escape_string($url);
		$direccion = $conn->real_escape_string($direccion);
		$codpostal = $conn->real_escape_string($codpostal);
		$latitud = $conn->real_escape_string($latitud);
		$longitud = $conn->real_escape_string($longitud);
		$telefono = $conn->real_escape_string($telefono);
		$email = $conn->real_escape_string($email);
		$categoria = $conn->real_escape_string($categoria);
		$subcategoria = $conn->real_escape_string($subcategoria);

		$query = sprintf("INSERT INTO `restaurantes` (`id`, `nombre`, `descripcion`, `horario`, `url`, `direccion`, `codpostal`, `latitud`, `longitud`, `telefono`, `email`, `categoria`, `subcategoria`) VALUES (NULL,  '$nombre',  '$descripcion', '$horario',  '$url', '$direccion',  '$codpostal', '$latitud', '$longitud', '$telefono',  '$email',  '$categoria',  '$subcategoria')");
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
		$escaped_url = $conn->real_escape_string($this->url);
		$escaped_direccion = $conn->real_escape_string($this->direccion);
		$escaped_codpostal = $conn->real_escape_string($this->codpostal);
		$escaped_latitud = $conn->real_escape_string($this->latitud);
		$escaped_longitud = $conn->real_escape_string($this->longitud);
		$escaped_telefono = $conn->real_escape_string($this->telefono);
		$escaped_email = $conn->real_escape_string($this->email);
		$escaped_categoria = $conn->real_escape_string($this->categoria);
		$escaped_subcategoria = $conn->real_escape_string($this->subcategoria);

		$query = sprintf("UPDATE restaurantes SET id = '$escaped_id', nombre = '$escaped_nombre', descripcion = '$escaped_descripcion', horario = '$escaped_horario', url = '$escaped_url', direccion = '$escaped_direccion', codpostal = '$escaped_codpostal', latitud = '$escaped_latitud', longitud = '$escaped_longitud', telefono = '$escaped_telefono', email = '$escaped_email', categoria = '$escaped_categoria', subcategoria = '$escaped_subcategoria' WHERE id = $this->id");
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

		$query = sprintf("DELETE FROM restaurantes WHERE restaurantes.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}



}