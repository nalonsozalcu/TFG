<?php
require_once '../config.php';
require_once '../classes/Restaurante.php';

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;
$horario = $_POST["horario"] != "" ? $_POST["horario"] : null;
$url = $_POST["url"] != "" ? $_POST["url"] : null;
$direccion = $_POST["direccion"] != "" ? $_POST["direccion"] : null;
$codpostal = $_POST["codpostal"] != "" ? $_POST["codpostal"] : null;
$latitud = $_POST["latitud"] != "" ? $_POST["latitud"] : null;
$longitud = $_POST["longitud"] != "" ? $_POST["longitud"] : null;
$categoria = isset($_POST['categoria']) ? $_POST["categoria"] : null;
$subcategoria = isset($_POST['subcategoria']) ? $_POST["subcategoria"] : null;
$email = $_POST["email"] != "" ? $_POST["email"] : null;
$telefono = $_POST["telefono"] != "" ? $_POST["telefono"] : null;

if (Restaurante::registrar($nombre,  $descripcion,  $horario,  $url, $direccion,  $codpostal,  $latitud,  $longitud,  $telefono,  $email, $categoria, $subcategoria))
    header("location: ../dashboard/adminPage.php?content=up_indiv");
else
    header("location: ../dashboard/adminPage.php?content=up_indiv&regpass=false");
