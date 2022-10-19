<?php

require_once '../config.php';

$username = $_POST["username"] != "" ? $_POST["username"] : null;
$email = $_POST["email"] != "" ? $_POST["email"] : null;
$password = $_POST["password"] != "" ? $_POST["password"] : null;
$password2 = $_POST["password2"] != "" ? $_POST["password2"] : null;
$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$apellidos = $_POST["apellidos"] != "" ? $_POST["apellidos"] : null;
$avatar = $_POST["avatar"] != "" ? $_POST["avatar"] : null;

if (Usuario::existeUsuario($email))
   header("location: ../signupPage.php?userexists=true");
else if ($password != $password2)
   header("location: ../signupPage.php?regpass=false");
else {
   if (Usuario::registrar($username, $email, $password, $nombre, $apellidos, $avatar))
      header("location: ../dashboard/loginPage.php");
}