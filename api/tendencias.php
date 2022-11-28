<?php
require_once '../config.php';

$action = $_GET['action'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}
if(isset($_GET['id_actividad'])){
    $id_actividad = $_GET['id_actividad'];
}

$conn = Aplicacion::getConexionBD();


if($action === "delete"){ //elimina la actividad de tendencias

    $id = $conn->real_escape_string($id);

    $query = sprintf("DELETE FROM tendencias WHERE id=$id");
    $rs = $conn->query($query);
    if (!$rs) {
        error_log($conn->error);
    } else if ($conn->affected_rows != 1) {
        error_log("Se han actualizado '$conn->affected_rows' !");
    } else 
        header("location: ../dashboard/adminPage.php?content=admin&table=$tipo");
}

if($action === "new"){ //añade la actividad a tendencias
    $tipo = $conn->real_escape_string($tipo);
    $id_actividad = $conn->real_escape_string($id_actividad);

    $query = sprintf("INSERT INTO `tendencias` (`tipo_actividad`, `id_actividad`) VALUES ('$tipo', '$id_actividad')");
    $result = $conn->query($query);
    
    if (!$result) {
        error_log($conn->error);
    } else if ($conn->affected_rows != 1) {
        error_log("Se han actualizado '$conn->affected_rows' !");
    } else header("location: ../dashboard/adminPage.php?content=admin&table=$tipo");
}