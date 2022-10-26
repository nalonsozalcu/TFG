<?php
require_once '../config.php';

$categoria = isset($_POST['categoria']) ? $_POST["categoria"] : null;
$subcategoria = isset($_POST['subcategoria']) ? $_POST["subcategoria"] : null;
$audiencia = isset($_POST['audiencia']) ? $_POST["audiencia"] : null;

$type = isset($_GET['type']) ? $_GET['type'] : null;


$conn = Aplicacion::getConexionBD();

if($categoria){
	$table = "categorias_".$type;
	$categoria = $conn->real_escape_string($categoria);
	$query = sprintf("INSERT INTO `$table` (`id`, `categoria`) VALUES (NULL, '$categoria')");
	$result = $conn->query($query);
}else if($subcategoria){
	$table = "subcategorias_".$type;
	$subcategoria = $conn->real_escape_string($subcategoria);
	$query = sprintf("INSERT INTO `$table` (`id`, `subcategoria`) VALUES (NULL, '$subcategoria')");
	$result = $conn->query($query);
}else if($audiencia){
	$table = "audiencia_".$type;
	$audiencia = $conn->real_escape_string($audiencia);
	$query = sprintf("INSERT INTO `$table` (`id`, `tipo`) VALUES (NULL, '$audiencia')");
	$result = $conn->query($query);
}

if (!$result) 
    header("location: ../dashboard/adminPage.php?content=up_indiv&table=$type");
else
    header("location: ../dashboard/adminPage.php?content=up_indiv&table=$type&cat=false");