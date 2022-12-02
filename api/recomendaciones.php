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


if($action === "discard"){ //descarta la recomendacion de contacto
    if(Usuario::delete_recomendacion($id))
        header("location: ../dashboard/recomendacionesPage.php");
    else
        header("location: ../dashboard/recomendacionesPage.php");
}

if($action === "acept"){ //añade la actividad a favoritos
    if($tipo === "plan"){
        if(Usuario::is_planfavorito($_SESSION["idUsuario"], $id_actividad) && Usuario::delete_recomendacion($id))
        header("location: ../dashboard/recomendacionesPage.php");
    else if(Usuario::new_planfavorito($_SESSION["idUsuario"], $id_actividad) && Usuario::delete_recomendacion($id))
            header("location: ../dashboard/recomendacionesPage.php");
    else
        header("location: ../dashboard/recomendacionesPage.php");
    }else{
        if(Usuario::is_favorito($_SESSION["idUsuario"], $tipo, $id_actividad) && Usuario::delete_recomendacion($id))
        header("location: ../dashboard/recomendacionesPage.php");
    else if(Usuario::new_favorito($_SESSION["idUsuario"], $tipo, $id_actividad) && Usuario::delete_recomendacion($id))
            header("location: ../dashboard/recomendacionesPage.php");
    else
        header("location: ../dashboard/recomendacionesPage.php");
    }
    
}

if($action === "send"){ //envia una recomendacion

if(isset($_GET['id_contacto'])){
    $id_contacto = $_GET['id_contacto'];
}

if (Usuario::send_recomendacion($id_contacto, $_SESSION["idUsuario"], $tipo, $id_actividad))
    header("location: ../dashboard/actividadPage.php?content=$tipo&id=$id_actividad&send=true");

else
    header("location: ../dashboard/actividadPage.php?content=$tipo&id=$id_actividad&send=false");
}