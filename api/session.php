<?php
require_once '../classes/Usuario.php';
function login()
{
  $email = isset($_POST["email"]) ? $_POST["email"] : null;
  $password = isset($_POST["password"]) ? $_POST["password"] : null;
  
  $usuario = Usuario::get_user_from_email($email);

  if ($usuario) {
    if ($usuario->verifyPassword($password)) {
      $_SESSION["login"] = true;
      $_SESSION["username"] = $usuario->username();
      $_SESSION["email"] = $usuario->email();
      $_SESSION["idUsuario"] = $usuario->id();
      $_SESSION["nombre"] = $usuario->nombre();
      $_SESSION["avatar"] = $usuario->avatar();
      $_SESSION['lastcheck'] = time();
      
      if($usuario->rol() == "user"){
        $_SESSION["esUser"] = true;
      }
      if($usuario->rol() == "admin"){
        $_SESSION["esAdmin"] = true;
      }
      return true;
    } 
  }

}

function logout(){
  //Doble seguridad: unset + destroy
  unset($_SESSION["login"]);
  unset($_SESSION["email"]);
  unset($_SESSION["idUsuario"]);
  unset($_SESSION["esUser"]);
  unset($_SESSION["esAdmin"]);
  unset($_SESSION["nombre"]);

  session_destroy();
}
