<?php
require_once '../config.php';
require_once '../classes/Evento.php';

$action = $_GET['action'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $evento = Evento::get_evento_by_id($id);
}

if($action === "delete"){
    if(Evento::delete_by_id($id))
        header("location: ../dashboard/adminPage.php?content=admin&table=eventos&delete=true");
    else
        header("location: ../dashboard/adminPage.php?content=admin&table=eventos&delete=false");
}
else{

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;
$hora = $_POST["hora"] != "" ? $_POST["hora"] : null;
$url = $_POST["url"] != "" ? $_POST["url"] : null;
$direccion = $_POST["direccion"] != "" ? $_POST["direccion"] : null;
$codpostal = $_POST["codpostal"] != "" ? $_POST["codpostal"] : null;
$fecha_fin = $_POST["fecha_fin"] != "" ? $_POST["fecha_fin"] : null;
$fecha_ini = $_POST["fecha_ini"] != "" ? $_POST["fecha_ini"] : null;
$latitud = $_POST["latitud"] != "" ? $_POST["latitud"] : null;
$longitud = $_POST["longitud"] != "" ? $_POST["longitud"] : null;
$lugar = $_POST["lugar"] != "" ? $_POST["lugar"] : null;
$precio = $_POST["precio"] != "" ? $_POST["precio"] : null;
$dias = $_POST["dias"] != "" ? $_POST["dias"] : null;
$dias_ex = $_POST["dias_ex"] != "" ? $_POST["dias_ex"] : null;
$gratis = isset($_POST["gratis"]) ? $_POST["gratis"] : 0;
$categorias = isset($_POST['categoria']) ? $_POST["categoria"] : null;
$audiencias = isset($_POST["audiencia"]) ? $_POST["audiencia"] : null;

if($action === "new"){
    if (Evento::registrar($nombre, $descripcion, $precio, $gratis, $dias, $dias_ex, $fecha_ini, $fecha_fin, $hora, $url, $lugar, $direccion, $codpostal, $latitud, $longitud, $categorias, $audiencias, true))
        header("location: ../dashboard/adminPage.php?content=up_indiv&ok=true");
    else
        header("location: ../dashboard/adminPage.php?content=up_indiv&ok=false");
    }
    
    if($action === "update"){
        if($nombre)$evento->setNombre($nombre);
        if($descripcion)$evento->setDescripcion($descripcion);
        if($hora)$evento->setHora($hora);
        if($url)$evento->setUrl($url);
        if($direccion)$evento->setDireccion($direccion);
        if($codpostal)$evento->setCodpostal($codpostal);
        if($fecha_fin)$evento->setFecha_fin($fecha_fin);
        if($fecha_ini)$evento->setFecha_ini($fecha_ini);
        if($latitud)$evento->setLatitud($latitud);
        if($longitud)$evento->setLongitud($longitud);
        if($lugar)$evento->setLugar($lugar);
        if($precio)$evento->setPrecio($precio);
        if($dias)$evento->setDias($dias);
        if($dias_ex)$evento->setDias_ex($dias_ex);
        if($gratis)$evento->setGratis($gratis);
    
        if($evento->update())
            header("location: ../dashboard/adminPage.php?content=admin&table=eventos&update=true");
        else
            header("location: ../dashboard/adminPage.php?content=admin&table=eventos&update=false");
    }
    }


