<?php
require_once '../config.php';

$action = $_GET['action'];
if(isset($_GET['id'])){
    $id_contacto = $_GET['id'];
}
if($action === "delete"){ //elimina un contacto de la lista de contactos
    if(Usuario::delete_contacto($_SESSION["idUsuario"], $id_contacto) &&
        Usuario::delete_contacto($id_contacto, $_SESSION["idUsuario"]))
        header("location: ../dashboard/contactsPage.php?delete=true");
    else
        header("location: ../dashboard/contactsPage.php?delete=false");
}

if($action === "discard"){ //descarta una solicitud de contacto
    if(Usuario::delete_solicitud($_SESSION["idUsuario"], $id_contacto))
        header("location: ../dashboard/solicitudPage.php");
    else
        header("location: ../dashboard/solicitudPage.php");
}

if($action === "acept"){ //añaden ambos contactos a la lista de contactos y elimina la solicitud
    if(Usuario::set_contacto($id_contacto, $_SESSION["idUsuario"]) &&
        Usuario::set_contacto($_SESSION["idUsuario"], $id_contacto) && 
        Usuario::delete_solicitud($_SESSION["idUsuario"], $id_contacto))
        header("location: ../dashboard/solicitudPage.php");
    else
        header("location: ../dashboard/solicitudPage.php");
}

if($action === "send"){ //envia una solicitud

$username = $_POST["username"] != "" ? $_POST["username"] : null;
$id_contacto= Usuario::existeUsername($username);

if(!$id_contacto)
    header("location: ../dashboard/contactsPage.php?username=false");

else if($id_contacto == $_SESSION["idUsuario"])
    header("location: ../dashboard/contactsPage.php?send=false");

else if (Usuario::is_solicitud($_SESSION["idUsuario"], $id_contacto))
    header("location: ../dashboard/contactsPage.php?sol_send=true");

else if (Usuario::is_solicitud($id_contacto, $_SESSION["idUsuario"]))
    header("location: ../dashboard/contactsPage.php?sol_recived=true");

else if (Usuario::is_contacto($_SESSION["idUsuario"], $id_contacto))
    header("location: ../dashboard/contactsPage.php?contact=true");

else if (Usuario::set_solicitud($_SESSION["idUsuario"], $id_contacto))
    header("location: ../dashboard/contactsPage.php?send=true");

else
    header("location: ../dashboard/contactsPage.php?send=false");
}
