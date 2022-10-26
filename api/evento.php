<?php
require_once '../config.php';
require_once '../classes/Evento.php';

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;
$desc_sitio = $_POST["desc_sitio"] != "" ? $_POST["desc_sitio"] : null;
$horario = $_POST["horario"] != "" ? $_POST["horario"] : null;
$transporte = $_POST["transporte"] != "" ? $_POST["transporte"] : null;
$url = $_POST["url"] != "" ? $_POST["url"] : null;
$direccion = $_POST["direccion"] != "" ? $_POST["direccion"] : null;
$codpostal = $_POST["codpostal"] != "" ? $_POST["codpostal"] : null;
$fecha_fin = $_POST["fecha_fin"] != "" ? $_POST["fecha_fin"] : null;
$fecha_ini = $_POST["fecha_ini"] != "" ? $_POST["fecha_ini"] : null;
$audiencia = $_POST["audiencia"] != "" ? $_POST["audiencia"] : null;
$latitud = $_POST["latitud"] != "" ? $_POST["latitud"] : null;
$longitud = $_POST["longitud"] != "" ? $_POST["longitud"] : null;
$categoria = isset($_POST['categoria']) ? $_POST["categoria"] : null;
$email = $_POST["email"] != "" ? $_POST["email"] : null;
$telefono = $_POST["telefono"] != "" ? $_POST["telefono"] : null;
$lugar = $_POST["lugar"] != "" ? $_POST["lugar"] : null;
$precio = $_POST["precio"] != "" ? $_POST["precio"] : null;
$dias = $_POST["dias"] != "" ? $_POST["dias"] : null;
$dias_ex = $_POST["dias_ex"] != "" ? $_POST["dias_ex"] : null;
$gratis = $_POST["gratis"] != "" ? $_POST["gratis"] : null;

if (Evento::($nombre,  $descripcion, $desc_sitio,  $horario,  $transporte,  $url, $direccion,  $codpostal,  $latitud,  $longitud,  $categoria, $fecha_fin, $fecha_ini,  $gratis,  $audiencia,  $dias,  $dias_ex,  $email,  $lugar,  $precio,  $telefono))
    header("location: ../dashboard/adminPage.php?content=up_indiv");
else
    header("location: ../dashboard/adminPage.php?content=up_indiv&regpass=false");
