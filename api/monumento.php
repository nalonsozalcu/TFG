<?php
require_once '../config.php';
require_once '../classes/Monumento.php';

$action = $_GET['action'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $monumento = Monumento::get_monumento_by_id($id);
}

if($action === "delete"){
    if(Monumento::delete_by_id($id))
        header("location: ../dashboard/adminPage.php?content=admin&table=monumentos&delete=true");
    else
        header("location: ../dashboard/adminPage.php?content=admin&table=monumentos&delete=false");
}
else{

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;
$url = $_POST["url"] != "" ? $_POST["url"] : null;
$direccion = $_POST["direccion"] != "" ? $_POST["direccion"] : null;
$codpostal = $_POST["codpostal"] != "" ? $_POST["codpostal"] : null;
$fecha = $_POST["fecha"] != "" ? $_POST["fecha"] : null;
$autores = $_POST["autores"] != "" ? $_POST["autores"] : null;
$latitud = $_POST["latitud"] != "" ? $_POST["latitud"] : null;
$longitud = $_POST["longitud"] != "" ? $_POST["longitud"] : null;
$categorias = isset($_POST['categoria']) ? $_POST["categoria"] : null;


if($action === "new"){
    if (Monumento::registrar($nombre, $descripcion, $url, $direccion, $codpostal, $latitud, $longitud, $fecha, $autores, $categorias, true))
        header("location: ../dashboard/adminPage.php?content=up_indiv");
    else
        header("location: ../dashboard/adminPage.php?content=up_indiv&regpass=false");

    }
    
    if($action === "update"){
        if($nombre)$monumento->setNombre($nombre);
        if($descripcion)$monumento->setDescripcion($descripcion);
        if($url)$monumento->setUrl($url);
        if($direccion)$monumento->setDireccion($direccion);
        if($codpostal)$monumento->setCodpostal($codpostal);
        if($fecha)$monumento->setFecha($fecha);
        if($autores)$monumento->setAutores($autores);
        if($latitud)$monumento->setLatitud($latitud);
        if($longitud)$monumento->setLongitud($longitud);
    
        if($monumento->update())
            header("location: ../dashboard/adminPage.php?content=admin&table=monumentos&update=true");
        else
            header("location: ../dashboard/adminPage.php?content=admin&table=monumentos&update=false");
    }
    }
