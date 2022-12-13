<?php
require_once '../config.php';

$nombre = isset($_POST["nombre"]) && $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$apellidos = isset($_POST["apellidos"]) && $_POST["apellidos"] != "" ? $_POST["apellidos"] : null;
$email = isset($_POST["email"]) && $_POST["email"] != "" ? $_POST["email"] : null;
$username = isset($_POST["username"]) && $_POST["username"] != "" ? $_POST["username"] : null;
$avatar = isset($_FILES['avatar']) ? $_FILES["avatar"] : null;
$pass = isset($_POST["contrasenaAnt"]) && $_POST["contrasenaAnt"] != "" ? $_POST["contrasenaAnt"] : null;
$newPass1 = isset($_POST["contrasenaNueva1"]) && $_POST["contrasenaNueva1"] != "" ? $_POST["contrasenaNueva1"] : null;
$newPass2 = isset($_POST["contrasenaNueva2"]) && $_POST["contrasenaNueva2"] != "" ? $_POST["contrasenaNueva2"] : null;
$cat_museo = (isset($_POST["cat_museo"]) && $_POST['cat_museo']) ? $_POST["cat_museo"] : null;
$cat_monumento = (isset($_POST["cat_monumento"]) && $_POST['cat_monumento']) ? $_POST["cat_monumento"] : null;
$cat_restaurante = (isset($_POST["cat_restaurante"]) && $_POST['cat_restaurante']) ? $_POST["cat_restaurante"] : null;
$cat_evento = (isset($_POST["cat_evento"]) && $_POST['cat_evento']) ? $_POST["cat_evento"] : null;
$audiencia = (isset($_POST["audiencia"]) && $_POST['audiencia']) ? $_POST["audiencia"] : null;

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
if($cat_museo)$usuario->setCategoria("museos", $cat_museo);
if($cat_monumento)$usuario->setCategoria("monumentos", $cat_monumento);
if($cat_restaurante)$usuario->setCategoria("restaurantes", $cat_restaurante);
if($cat_evento)$usuario->setCategoria("eventos", $cat_evento);
if($audiencia)$usuario->setCategoria("audiencias", $audiencia);

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


