<?php
require_once '../config.php';

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$apellidos = $_POST["apellidos"] != "" ? $_POST["apellidos"] : null;
$email = $_POST["email"] != "" ? $_POST["email"] : null;
$username = $_POST["username"] != "" ? $_POST["username"] : null;
$avatar = isset($_FILES['avatar']) ? $_FILES["avatar"] : null;
$pass = $_POST["contrasenaAnt"] != "" ? $_POST["contrasenaAnt"] : null;
$newPass1 = $_POST["contrasenaNueva1"] != "" ? $_POST["contrasenaNueva1"] : null;
$newPass2 = $_POST["contrasenaNueva2"] != "" ? $_POST["contrasenaNueva2"] : null;

$usuario = Usuario::get_user_from_email($_SESSION["email"]);

if($username)$usuario->setUsername($username);
if($email)$usuario->setEmail($email);
if($nombre)$usuario->setNombre($nombre);
if($apellidos)$usuario->setApellidos($apellidos);
if($avatar && $avatar['name']!= ""){
    $usuario->updateAvatar($avatar['name']);

    $file_name = $avatar['name'];
    $file_size =$avatar['size'];
    $file_tmp =$avatar['tmp_name'];
    $file_type=$avatar['type'];
    $file_ext=strtolower(end(explode('.',$file_name)));

    $extensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)=== false){
        header("location: ../dashboard/profilePage.php?ext=false");
        exit(1);
    }

    if($file_size > 2097152){
        header("location: ../dashboard/profilePage.php?tam=false");
        exit(1);
    }

    $dir="../files/users/".$username."/";
    mkdir($dir);

    move_uploaded_file($file_tmp,$dir.$file_name);
    $_SESSION["avatar"] = $usuario->avatar();
 }

if($pass != null){
    if ($usuario->verifyPassword($pass)) {
        if ($newPass1 != null) { //si el usuario introduce una nueva contraseña para cambiarla
            if ($newPass1 == $newPass2) {
                $usuario->updatePassword($newPass1);
            } else {
                header("location: ../dashboard/profilePage.php?newpass=false"); //si las nuevas contraseñas no coinciden
                exit(1);
            }
        }
    } else {
        header("location: ../dashboard/profilePage.php?pass=false");
        exit(1);
    }
}

$usuario->update();
header("location: ../dashboard/profilePage.php");


