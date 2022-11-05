<?php
require_once '../config.php';
require_once '../classes/Evento.php';

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

if (Evento::registrar($nombre, $descripcion, $precio, $gratis, $dias, $dias_ex, $fecha_ini, $fecha_fin, $hora, $url, $lugar, $direccion, $codpostal, $latitud, $longitud, $categorias, $audiencias, true))
    header("location: ../dashboard/adminPage.php?content=up_indiv");
else
    header("location: ../dashboard/adminPage.php?content=up_indiv&regpass=false");
