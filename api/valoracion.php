<?php
require_once '../config.php';
require_once '../classes/Evento.php';
require_once '../classes/Museo.php';
require_once '../classes/Monumento.php';
require_once '../classes/Restaurante.php';


$action = $_GET['action'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(isset($_GET['id_actividad'])){
    $id_actividad = $_GET['id_actividad'];
}
if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}
if(isset($_POST['valoracion'])){
    $valoracion = $_POST['valoracion'];
}

if($action === "delete"){ //elimina la valoracion
    if($tipo === "evento"){
        Evento::delete_valoracion($id);
    }
    if($tipo === "restaurante"){
        Restaurante::delete_valoracion($id);
    }
    if($tipo === "museo"){
        Museo::delete_valoracion($id);
    }
    if($tipo === "monumento"){
        Monumento::delete_valoracion($id);
    }
    header("location: ../dashboard/actividadPage.php?content=$tipo&id=$id_actividad");
}

if($action === "new"){ //añade la valoracion
    if($tipo === "evento"){
        Evento::set_valoracion($id_actividad, $_SESSION["idUsuario"], $valoracion);
    }
    if($tipo === "restaurante"){
        Restaurante::set_valoracion($id_actividad, $_SESSION["idUsuario"], $valoracion);
    }
    if($tipo === "museo"){
        Museo::set_valoracion($id_actividad, $_SESSION["idUsuario"], $valoracion);
    }
    if($tipo === "monumento"){
        Monumento::set_valoracion($id_actividad, $_SESSION["idUsuario"], $valoracion);
    }
    header("location: ../dashboard/actividadPage.php?content=$tipo&id=$id_actividad");
}