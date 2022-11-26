<?php
require_once '../config.php';

$action = $_GET['action'];
$from = $_GET['from'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}
if(isset($_GET['id_actividad'])){
    $id_actividad = $_GET['id_actividad'];
}
if(isset($_GET['id_contacto'])){
    $id_contacto = $_GET['id_contacto'];
}


if($action === "delete"){ //elimina la actividad de favoritos
    if(Usuario::delete_favorito($id)){
        if($from === "ind")
            header("location: ../dashboard/actividadPage.php?content=$tipo&id=$id_actividad");
        if($from === "prof")
            header("location: ../dashboard/profilePage.php?fav=true");
        if($from === "contact")
            header("location: ../dashboard/userPage.php?id=$id_contacto");
        if($from === "acts")
            header("location: ../dashboard/actividadesPage.php?table=$tipo");
    }
}

if($action === "new"){ //añade la actividad a favoritos
    if(Usuario::new_favorito($_SESSION["idUsuario"], $tipo, $id_actividad)){
        if($from === "ind")
            header("location: ../dashboard/actividadPage.php?content=$tipo&id=$id_actividad");
        if($from === "contact")
            header("location: ../dashboard/userPage.php?id=$id_contacto");
        if($from === "acts")
            header("location: ../dashboard/actividadesPage.php?table=$tipo");
    }
}