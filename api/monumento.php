<?php
require_once '../config.php';
require_once '../classes/Monumento.php';

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

if (Monumento::registrar($nombre, $descripcion, $url, $direccion, $codpostal, $latitud, $longitud, $fecha, $autores, $categorias, true))
    header("location: ../dashboard/adminPage.php?content=up_indiv");
else
    header("location: ../dashboard/adminPage.php?content=up_indiv&regpass=false");
