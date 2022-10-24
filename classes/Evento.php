<?php 

class Evento
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
	private $categoria;
	private $fecha_fin;
	private $fecha_ini;
	private $gratis;
	private $audiencia;
	private $dias;
	private $dias_ex;
	private $email;
	private $lugar;
	private $precio;
	private $telefono;

	

	// ---> Constructor <---

	private function __construct(?int $id, string $nombre, string $descripcion, string $desc_sitio, string $horario, string $transporte, string $url,string $direccion, string $codpostal, string $latitud, string $longitud, string $categoria, date $fecha_fin, date $fecha_ini, int $gratis, string $audiencia, string $dias, string $dias_ex, string $email, string $lugar, string $precio, string $telefono)
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
		$this->categoria = $categoria;
		$this->fecha_fin = $fecha_fin;
		$this->fecha_ini = $fecha_ini;
		$this->gratis = $gratis;
		$this->audiencia = $audiencia;
		$this->dias = $dias;
		$this->dias_ex = $dias_ex;
		$this->email = $email;
		$this->lugar = $lugar;
		$this->precio = $precio;
		$this->telefono = $telefono;

		
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

	public function categoria() : string {
		return $this->categoria;
	}
	public function setCategoria(string $categoria) : void {
		$this->categoria = $categoria;
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

	public function audiencia() : string {
		return $this->audiencia;
	}
	public function setAudiencia(string $audiencia) : void {
		$this->audiencia = $audiencia;
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

	public function email() : string {
		return $this->email;
	}
	public function setEmail(string $email) : void {
		$this->email = $email;
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

	public function telefono() : string {
		return $this->telefono;
	}
	public function setTelefono(string $telefono) : void {
		$this->telefono = $telefono;
	}

	
	// ---> Funciones para registrar, actualizar o borrar el museo <---

	public static function registrar($id,  $nombre,  $descripcion, $desc_sitio,  $horario,  $transporte,  $url, $direccion,  $codpostal,  $categoria,  $fecha_fin,  $fecha_fin,  $gratis,  $audiencia,  $dias,  $dias_ex,  $email,  $lugar,  $precio,  $telefono)
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
		$categoria = $conn->real_escape_string($categoria);
		$fecha_fin = $conn->real_escape_string($fecha_fin);
		$fecha_ini = $conn->real_escape_string($fecha_ini);
		$gratis = $conn->real_escape_string($gratis);
		$audiencia = $conn->real_escape_string($audiencia);
		$dias = $conn->real_escape_string($dias);
		$dias_ex = $conn->real_escape_string($dias_ex);
		$email = $conn->real_escape_string($email);
		$lugar = $conn->real_escape_string($lugar);
		$precio = $conn->real_escape_string($precio);
		$telefono = $conn->real_escape_string($telefono);



		$query = sprintf("INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `desc_sitio`, `horario`, `transporte`, `url`, `direccion`, `codpostal`, `latitud`, `longitud`, `categoria`, `fecha_fin`, `fecha_ini`, `gratis`, `audiencia`, `dias`, `dias_ex`, `email`, `lugar`, `precio`, `telefono`) VALUES ('$id',  '$nombre',  '$descripcion', '$desc_sitio', '$horario',  '$transporte',  '$url', '$direccion',  '$codpostal', '$latitud', '$longitud',  '$categoria', '$fecha_fin',  '$autores_ini', '$gratis',  '$audiencia', '$dias',  '$dias_ex', '$email',  '$lugar', '$precio',  '$telefono')");
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
		$escaped_categoria = $conn->real_escape_string($this->categoria);
		$escaped_fecha_fin = $conn->real_escape_string($this->fecha_fin);
		$escaped_fecha_ini = $conn->real_escape_string($this->fecha_ini);
		$escaped_gratis = $conn->real_escape_string($this->gratis);
		$escaped_audiencia = $conn->real_escape_string($this->audiencia);
		$escaped_dias = $conn->real_escape_string($this->dias);
		$escaped_dias_ex = $conn->real_escape_string($this->dias_ex);
		$escaped_email = $conn->real_escape_string($this->email);
		$escaped_lugar = $conn->real_escape_string($this->lugar);
		$escaped_precio = $conn->real_escape_string($this->precio);
		$escaped_telefono = $conn->real_escape_string($this->telefono);

		$query = sprintf("UPDATE eventos SET id = '$escaped_id', nombre = '$escaped_nombre', descripcion = '$escaped_descripcion', desc_sitio = '$escaped_desc_sitio', horario = '$escaped_horario', transporte = '$escaped_transporte', url = '$escaped_url', direccion = '$escaped_direccion', codpostal = '$escaped_codpostal', latitud = '$escaped_latitud', longitud = '$escaped_longitud', categoria = '$escaped_categoria', fecha_fin = '$escaped_fecha_fin', fecha_ini = '$escaped_fecha_ini', gratis = '$escaped_gratis', audiencia = '$escaped_audiencia', dias = '$escaped_dias', dias_ex = '$escaped_dias_ex', email = '$escaped_email', lugar = '$escaped_lugar', precio = '$escaped_precio', telefono = '$escaped_telefono' WHERE id = $this->id");
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