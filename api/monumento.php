<?php
require_once '../config.php';
require_once '../classes/Monumento.php';

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;
$desc_sitio = $_POST["desc_sitio"] != "" ? $_POST["desc_sitio"] : null;
$horario = $_POST["horario"] != "" ? $_POST["horario"] : null;
$transporte = $_POST["transporte"] != "" ? $_POST["transporte"] : null;
$url = $_POST["url"] != "" ? $_POST["url"] : null;
$direccion = $_POST["direccion"] != "" ? $_POST["direccion"] : null;
$codpostal = $_POST["codpostal"] != "" ? $_POST["codpostal"] : null;
$fecha = $_POST["fecha"] != "" ? $_POST["fecha"] : null;
$autores = $_POST["autores"] != "" ? $_POST["autores"] : null;
$categoria = isset($_POST['categoria']) ? $_POST["categoria"] : null;

if (Monumento::registrar($nombre, $descripcion, $desc_sitio, $horario, $transporte, $url, $direccion, $codpostal, $fecha, $autores, $categoria))
    header("location: ../dashboard/adminPage.php?content=up_indiv");
else
    header("location: ../dashboard/adminPage.php?content=up_indiv&regpass=false");
