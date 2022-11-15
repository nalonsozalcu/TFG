<?php
require_once '../config.php';
require_once '../classes/Museo.php';

$action = $_GET['action'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $museo = Museo::get_museo_by_id($id);
}

if($action === "delete"){
    if(Museo::delete_by_id($id))
        header("location: ../dashboard/adminPage.php?content=admin&table=museos&delete=true");
    else
        header("location: ../dashboard/adminPage.php?content=admin&table=museos&delete=false");
}
else{

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;
$desc_sitio = $_POST["desc_sitio"] != "" ? $_POST["desc_sitio"] : null;
$horario = $_POST["horario"] != "" ? $_POST["horario"] : null;
$transporte = $_POST["transporte"] != "" ? $_POST["transporte"] : null;
$url = $_POST["url"] != "" ? $_POST["url"] : null;
$direccion = $_POST["direccion"] != "" ? $_POST["direccion"] : null;
$codpostal = $_POST["codpostal"] != "" ? $_POST["codpostal"] : null;
$email = $_POST["email"] != "" ? $_POST["email"] : null;
$telefono = $_POST["telefono"] != "" ? $_POST["telefono"] : null;
$latitud = $_POST["latitud"] != "" ? $_POST["latitud"] : null;
$longitud = $_POST["longitud"] != "" ? $_POST["longitud"] : null;
$categorias = isset($_POST['categoria']) ? $_POST["categoria"] : null;

if($action === "new"){
if (Museo::registrar($nombre,  $descripcion, $desc_sitio,  $horario,  $transporte,  $url, $direccion,  $codpostal,  $latitud,  $longitud,  $telefono,  $email, $categorias, true))
    header("location: ../dashboard/adminPage.php?content=up_indiv&ok=true");
else
    header("location: ../dashboard/adminPage.php?content=up_indiv&ok=false");
}

if($action === "update"){
    if($nombre)$museo->setNombre($nombre);
    if($descripcion)$museo->setDescripcion($descripcion);
    if($desc_sitio)$museo->setDesc_sitio($desc_sitio);
    if($horario)$museo->setHorario($horario);
    if($transporte)$museo->setTransporte($transporte);
    if($url)$museo->setUrl($url);
    if($direccion)$museo->setDireccion($direccion);
    if($codpostal)$museo->setCodpostal($codpostal);
    if($email)$museo->setEmail($email);
    if($telefono)$museo->setTelefono($telefono);
    if($latitud)$museo->setLatitud($latitud);
    if($longitud)$museo->setLongitud($longitud);

    if($museo->update())
        header("location: ../dashboard/adminPage.php?content=admin&table=museos&update=true");
    else
        header("location: ../dashboard/adminPage.php?content=admin&table=museos&update=false");
}
}