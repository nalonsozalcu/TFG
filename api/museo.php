<?php
require_once '../config.php';
require_once '../classes/Museo.php';

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

if (Museo::registrar($nombre,  $descripcion, $desc_sitio,  $horario,  $transporte,  $url, $direccion,  $codpostal,  $latitud,  $longitud,  $telefono,  $email, $categorias, true))
    header("location: ../dashboard/adminPage.php?content=up_indiv");
else
    header("location: ../dashboard/adminPage.php?content=up_indiv&regpass=false");
