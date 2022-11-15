<?php
require_once '../config.php';
require_once '../classes/Restaurante.php';

$action = $_GET['action'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $restaurante = Restaurante::get_restaurante_by_id($id);
}

if($action === "delete"){
    if(Restaurante::delete_by_id($id))
        header("location: ../dashboard/adminPage.php?content=admin&table=restaurantes&delete=true");
    else
        header("location: ../dashboard/adminPage.php?content=admin&table=restaurantes&delete=false");
}
else{

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;
$horario = $_POST["horario"] != "" ? $_POST["horario"] : null;
$url = $_POST["url"] != "" ? $_POST["url"] : null;
$direccion = $_POST["direccion"] != "" ? $_POST["direccion"] : null;
$codpostal = $_POST["codpostal"] != "" ? $_POST["codpostal"] : null;
$latitud = $_POST["latitud"] != "" ? $_POST["latitud"] : null;
$longitud = $_POST["longitud"] != "" ? $_POST["longitud"] : null;
$categorias = isset($_POST['categoria']) ? $_POST["categoria"] : null;
$subcategorias = isset($_POST['subcategoria']) ? $_POST["subcategoria"] : null;
$email = $_POST["email"] != "" ? $_POST["email"] : null;
$telefono = $_POST["telefono"] != "" ? $_POST["telefono"] : null;

if($action === "new"){
    if (Restaurante::registrar($nombre,  $descripcion,  $horario,  $url, $direccion,  $codpostal,  $latitud,  $longitud,  $telefono,  $email, $categorias, $subcategorias, true))
        header("location: ../dashboard/adminPage.php?content=up_indiv&ok=true");
    else
        header("location: ../dashboard/adminPage.php?content=up_indiv&ok=false");
    }
    
    if($action === "update"){
        if($nombre)$restaurante->setNombre($nombre);
        if($descripcion)$restaurante->setDescripcion($descripcion);
        if($horario)$restaurante->setHorario($horario);
        if($url)$restaurante->setUrl($url);
        if($direccion)$restaurante->setDireccion($direccion);
        if($codpostal)$restaurante->setCodpostal($codpostal);
        if($email)$restaurante->setEmail($email);
        if($telefono)$restaurante->setTelefono($telefono);
        if($latitud)$restaurante->setLatitud($latitud);
        if($longitud)$restaurante->setLongitud($longitud);
    
        if($restaurante->update())
            header("location: ../dashboard/adminPage.php?content=admin&table=restaurantes&update=true");
        else
            header("location: ../dashboard/adminPage.php?content=admin&table=restaurantes&update=false");
    }
    }


