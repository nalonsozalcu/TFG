<?php
require_once '../config.php';

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$apellidos = $_POST["apellidos"] != "" ? $_POST["apellidos"] : null;
$email = $_POST["email"] != "" ? $_POST["email"] : null;
$username = $_POST["username"] != "" ? $_POST["username"] : null;
$avatar = $_POST["avatar"] != "" ? $_POST["avatar"] : null;
$pass = $_POST["contrasenaAnt"] != "" ? $_POST["contrasenaAnt"] : null;
$newPass1 = $_POST["contrasenaNueva1"] != "" ? $_POST["contrasenaNueva1"] : null;
$newPass2 = $_POST["contrasenaNueva2"] != "" ? $_POST["contrasenaNueva2"] : null;

$usuario = Usuario::get_user_from_email($_SESSION["email"]);

$usuario->setUsername($username);
$usuario->setEmail($email);
$usuario->setNombre($nombre);
$usuario->setApellidos($apellidos);
if($avatar){$usuario->setAvatar($avatar);}


if ($usuario->verifyPassword($pass)) {
    if ($newPass1 != null) { //si el usuario introduce una nueva contraseña para cambiarla
        if ($newPass1 == $newPass2) {
            $usuario->updatePassword($newPass1);
        } else {
            header("location: ../dashboard/profilePage.php?newpass=false"); //si las nuevas contraseñas no coinciden
        }
    }
    $usuario->update();
    header("location: ../dashboard/profilePage.php");
} else {
    header("location: ../dashboard/profilePage.php?pass=false");
}
