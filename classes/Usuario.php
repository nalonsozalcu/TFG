<?php 

class Usuario
{
	private $id;
	private $username;
	private $password;
	private $email;
	private $nombre;
	private $apellidos;
	private $avatar;
	private $rol;

	// ---> Constructor <---

	private function __construct(?int $id, string $username, string $password, string $email, string $nombre, string $apellidos, $avatar, string $rol)
	{
		$this->setId($id);
		$this->setUsername($username);
		$this->password= $password;
		$this->setEmail($email);
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->avatar = $avatar;
		$this->rol = $rol;
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

	public function username() : string {
		return $this->username;
	}

	public function setUsername(string $username) : void {
		if (!$this->is_valid_username($username))
			throw new \InvalidArgumentException("Invalid username");
		$this->username = $username;
	}

	public function password() : string {
		return $this->password;
	}

	public function setPassword(string $password) {
		if ($this->password)
			throw new \Exception("Password is already set");

		if (!self::is_valid_password($password))
			throw new \InvalidArgumentException("Invalid password");

		$this->password = self::hashPassword($password);
	}

	public function email() : string {
		return $this->email;
	}

	public function setEmail(string $email) : void {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			throw new \InvalidArgumentException("Invalid email");
		$this->email = $email;
	}

	public function nombre() : string {
		return $this->nombre;
	}

	public function setNombre(string $nombre) : void {
		$this->nombre = $nombre;
	}

	public function apellidos() : string {
		return $this->apellidos;
	}

	public function setApellidos(string $apellidos) : void {
		$this->apellidos = $apellidos;
	}

	public function avatar() : string {
		return $this->avatar;
	}

	public function setAvatar(string $avatar) : void {
		$this->avatar = $avatar;
	}

	public function updateAvatar(string $avatar) : void {
		unlink("../files/users/".$this->username."/".$this->avatar);
		$this->avatar = $avatar;
	}

	public function rol() : string {
		return $this->rol;
	}

	public function setRol(string $rol) : void {
		$this->rol = $rol;
	}

	public function setCategoria($tipo, $categoria) : void {
		$conn = Aplicacion::getConexionBD();

		$id_user = $this->id;
		$categorias = "//";
		foreach ($categoria as $valor){
			$categorias .= $valor."/";
		}

		$query = sprintf("UPDATE relacion_categorias_usuarios SET `$tipo` = '$categorias' WHERE id_usuario = $id_user");
		$result = $conn->query($query);
		
		
	}

	private static function hash(string $pwd) {
		// return password_hash($pwd, PASSWORD_DEFAULT);
		return sha1($pwd);
	}

	// ---> Funciones para validación <---

	public static function is_valid_username($username) {
		return ctype_alnum($username);
	}

	private static function is_valid_password($passwd) {
		return true;
	}

	public function verifyPassword(string $password) : bool {
		// password_verify($password, $this->password);
		return sha1($password) == $this->password;
	}

	public function updatePassword(string $newPassword) : void {
		if (!self::is_valid_password($newPassword))
			throw new \InvalidArgumentException("Invalid password");
		$this->password = self::hash($newPassword);
	}

	// ---> Funciones para obtener usuarios <---
	public static function existeUsuario($email)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM usuarios WHERE usuarios.email='%s'", $conn->real_escape_string($email));
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return true;
			$rs->free();
		}
		return false;
	}
	public static function existeUsername($username)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT id FROM usuarios WHERE usuarios.username='%s'", $conn->real_escape_string($username));
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return $rs->fetch_assoc()["id"];
			$rs->free();
		}
		return false;
	}

	public static function get_user_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM usuarios WHERE usuarios.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			$fila = $rs->fetch_assoc();
			// $user = new Usuario($fila['id'], $fila['username'], $fila['password'], $fila['email'], $fila['nombre'], $fila['apellidos'], $fila['avatar'], $fila['rol']);
			
			$rs->free();

			return $fila;
		}
		return false;
	}

	public static function get_user_from_email($email){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM usuarios WHERE usuarios.email='%s'", $conn->real_escape_string($email));
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			$fila = $rs->fetch_assoc();
			$user = new Usuario($fila['id'], $fila['username'], $fila['password'], $fila['email'], $fila['nombre'], $fila['apellidos'], $fila['avatar'], $fila['rol']);
			$rs->free();

			return $user;
		}
		return false;
	}
	public static function get_all_users(){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM usuarios");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}
	public static function get_user_contactos_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM usuarios u INNER JOIN contactos c ON u.id = c.id_contacto AND c.id_usuario = $id");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}
	public static function get_user_solicitudes_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM usuarios u INNER JOIN solicitudes s ON u.id = s.id_solicitante AND s.id_solicitud = $id");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}
	public static function get_recomendaciones_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM `recomendaciones` WHERE `id_usuario` = '$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}
	public static function get_favoritos_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM `favoritos` WHERE `id_usuario` = '$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public static function get_favorito_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM `favoritos` WHERE `id` = '$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public static function get_planesfavoritos_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM `planes_favoritos` WHERE `id_usuario` = '$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}
	public static function get_num_solicitudes_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT Count('id_solicitantes') FROM `solicitudes` WHERE `id_solicitud` = '$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_assoc()["Count('id_solicitantes')"];
		}
		return false;
	}

	public static function is_solicitud($id_user, $id_contact)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM solicitudes WHERE id_solicitud=$id_contact AND id_solicitante=$id_user");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return true;
			$rs->free();
		}
		return false;
	}

	public static function set_solicitud($id_user, $id_contact)
	{
		$conn = Aplicacion::getConexionBD();

		$id_user = $conn->real_escape_string($id_user);
		$id_contact = $conn->real_escape_string($id_contact);


		$query = sprintf("INSERT INTO `solicitudes` (`id_solicitante`, `id_solicitud`) VALUES ('$id_user', '$id_contact')");
		$result = $conn->query($query);
		
		if (!$result) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function delete_solicitud($id_user, $id_contact)
	{
		$conn = Aplicacion::getConexionBD();

		$id_user = $conn->real_escape_string($id_user);
		$id_contact = $conn->real_escape_string($id_contact);

		$query = sprintf("DELETE FROM solicitudes WHERE id_solicitante=$id_contact AND id_solicitud=$id_user");
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function is_contacto($id_user, $id_contact)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM contactos WHERE id_contacto=$id_contact AND id_usuario=$id_user");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return true;
			$rs->free();
		}
		return false;
	}

	public static function set_contacto($id_user, $id_contact)
	{
		$conn = Aplicacion::getConexionBD();

		$id_user = $conn->real_escape_string($id_user);
		$id_contact = $conn->real_escape_string($id_contact);


		$query = sprintf("INSERT INTO `contactos` (`id_usuario`, `id_contacto`) VALUES ('$id_user', '$id_contact')");
		$result = $conn->query($query);
		
		if (!$result) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function delete_contacto($id_user, $id_contact)
	{
		$conn = Aplicacion::getConexionBD();

		$id_user = $conn->real_escape_string($id_user);
		$id_contact = $conn->real_escape_string($id_contact);

		$query = sprintf("DELETE FROM contactos WHERE id_contacto=$id_contact AND id_usuario=$id_user");
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function get_num_recomendaciones_by_id($id){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT Count('id') FROM `recomendaciones` WHERE `id_usuario` = '$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return $rs->fetch_assoc()["Count('id')"];
		}
		return false;
	}

	public static function recomendacion_sended($id_user, $id_contact, $tipo, $id_actividad)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM recomendaciones WHERE id_contacto='$id_contact' AND tipo_actividad='$tipo' AND id_actividad='$id_actividad' AND id_usuario='$id_user'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows > 0) {
			return true;
			$rs->free();
		}
		return false;
	}

	public static function send_recomendacion($id_user, $id_contact, $tipo, $id_actividad)
	{
		$conn = Aplicacion::getConexionBD();

		$id_user = $conn->real_escape_string($id_user);
		$id_contact = $conn->real_escape_string($id_contact);
		$tipo = $conn->real_escape_string($tipo);
		$id_actividad = $conn->real_escape_string($id_actividad);

		$query = sprintf("INSERT INTO `recomendaciones` (`id_usuario`, `id_contacto`, `tipo_actividad`, `id_actividad`) VALUES ('$id_user', '$id_contact', '$tipo', '$id_actividad')");
		$result = $conn->query($query);
		
		if (!$result) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function delete_recomendacion($id)
	{
		$conn = Aplicacion::getConexionBD();

		$id = $conn->real_escape_string($id);

		$query = sprintf("DELETE FROM recomendaciones WHERE id=$id");
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function is_favorito($id_user, $tipo, $id_actividad)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT id FROM favoritos WHERE tipo_actividad='$tipo' AND id_actividad='$id_actividad' AND id_usuario='$id_user'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return $rs->fetch_assoc()["id"];
			$rs->free();
		}
		return false;
	}

	public static function is_planfavorito($id_user, $id_plan)
	{
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT id FROM planes_favoritos WHERE id_plan='$id_plan' AND id_usuario='$id_user'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			return $rs->fetch_assoc()["id"];
			$rs->free();
		}
		return false;
	}

	public static function new_favorito($id_user, $tipo, $id_actividad)
	{
		$conn = Aplicacion::getConexionBD();

		$id_user = $conn->real_escape_string($id_user);
		$tipo = $conn->real_escape_string($tipo);
		$id_actividad = $conn->real_escape_string($id_actividad);

		$query = sprintf("INSERT INTO `favoritos` (`id_usuario`, `tipo_actividad`, `id_actividad`) VALUES ('$id_user', '$tipo', '$id_actividad')");
		$result = $conn->query($query);
		
		if (!$result) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function new_planfavorito($id_user, $id_plan)
	{
		$conn = Aplicacion::getConexionBD();

		$id_user = $conn->real_escape_string($id_user);
		$id_plan = $conn->real_escape_string($id_plan);

		$query = sprintf("INSERT INTO `planes_favoritos` (`id_usuario`, `id_plan`) VALUES ('$id_user', '$id_plan')");
		$result = $conn->query($query);
		
		if (!$result) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function delete_favorito($id)
	{
		$conn = Aplicacion::getConexionBD();

		$id = $conn->real_escape_string($id);

		$query = sprintf("DELETE FROM favoritos WHERE id=$id");
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function delete_planfavorito($id)
	{
		$conn = Aplicacion::getConexionBD();

		$id = $conn->real_escape_string($id);

		$query = sprintf("DELETE FROM planes_favoritos WHERE id=$id");
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}

	public static function has_categoria_by_id($id, $tipo, $id_categoria){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT `$tipo` FROM relacion_categorias_usuarios WHERE id_usuario='$id'");
		$rs = $conn->query($query);
		if($rs && $rs->num_rows == 1){
			$categorias = $rs->fetch_assoc()["$tipo"];
			if (strpos($categorias, "/".$id_categoria."/")) {
				return true;
				$rs->free();
			}
		}
		return false;
	}

	public static function get_categorias_by_id($id, $tipo){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT `$tipo` FROM `relacion_categorias_usuarios` WHERE `id_usuario` = '$id'");
		$rs = $conn->query($query);
		if ($rs && $rs->num_rows == 1) {
			$categorias = $rs->fetch_assoc()["$tipo"];
			$categorias = substr($categorias, 2);
			$categorias = substr($categorias, 0, -1);
			$categorias = explode("/", $categorias);
			return $categorias;
		}
		return false;
	}

	// ---> Funciones para registrar, actualizar o borrar el usuario <---

	public static function registrar($username, $email, $password, $nombre, $apellidos, $avatar, $cat_museo, $cat_monumento, $cat_restaurante, $cat_evento, $audiencia)
	{
		$conn = Aplicacion::getConexionBD();

		$username = $conn->real_escape_string($username);
		$email = $conn->real_escape_string($email);
		$password = self::hash($conn->real_escape_string($password));
		$nombre = $conn->real_escape_string($nombre);
		$apellidos = $conn->real_escape_string($apellidos);
		$avatar = $conn->real_escape_string($avatar);

		$query = sprintf("INSERT INTO `usuarios` (`id`, `username`, `email`, `password`, `nombre`, `apellidos`, `avatar`, `rol`) VALUES (NULL, '$username', '$email', '$password', '$nombre', '$apellidos','$avatar','user')");
		$result = $conn->query($query);

		if($result){
			$query = sprintf("SELECT MAX(`id`) FROM `usuarios`");
			$result = $conn->query($query);
			$id_user = $result->fetch_assoc()["MAX(`id`)"];
			$museos = "//";
			$monumentos = "//";
			$restaurantes = "//";
			$eventos = "//";
			$audiencias = "//";

			foreach ($cat_museo as $valor){
				$museos .= $valor."/";
			}
			foreach ($cat_monumento as $valor){
				$monumentos .= $valor."/";
			}
			foreach ($cat_restaurante as $valor){
				$restaurantes .= $valor."/";
			}
			foreach ($cat_evento as $valor){
				$eventos .= $valor."/";
			}
			foreach ($audiencia as $valor){
				$audiencias .= $valor."/";
			}
			$query = sprintf("INSERT INTO `relacion_categorias_usuarios` (`id_usuario`, `museos`, `monumentos`,`restaurantes`, `eventos`, `audiencias` ) VALUES ($id_user,  '$museos', '$monumentos', '$restaurantes', '$eventos', '$audiencias')");
			var_dump($query);
			$result = $conn->query($query);
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
		
		$escaped_username = $conn->real_escape_string($this->username);
		$escaped_email = $conn->real_escape_string($this->email);
		$escaped_pass = $conn->real_escape_string($this->password);
		$escaped_nombre = $conn->real_escape_string($this->nombre);
		$escaped_apellidos = $conn->real_escape_string($this->apellidos);
		$escaped_avatar = $conn->real_escape_string($this->avatar);

		$query = sprintf("UPDATE usuarios SET username = '$escaped_username', email = '$escaped_email', password = '$escaped_pass', nombre = '$escaped_nombre', apellidos = '$escaped_apellidos', avatar = '$escaped_avatar' WHERE id = $this->id");
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

		$query = sprintf("DELETE FROM usuarios WHERE usuarios.id='%s'", $conn->real_escape_string($id));
		$rs = $conn->query($query);
		if (!$rs) {
			error_log($conn->error);
		} else if ($conn->affected_rows != 1) {
			error_log("Se han actualizado '$conn->affected_rows' !");
		} else return true;
	}



}