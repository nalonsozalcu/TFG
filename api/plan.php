<?php
require_once '../config.php';
require_once '../classes/Plan.php';

$action = $_GET['action'];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $plan = Plan::get_plan_by_id($id);
}

if($action === "delete"){
    if(Plan::delete_by_id($id))
        header("location: ../dashboard/adminPage.php?content=admin&table=planes&delete=true");
    else
        header("location: ../dashboard/adminPage.php?content=admin&table=planes&delete=false");
}
else{

$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$fecha = $_POST["fecha"] != "" ? $_POST["fecha"] : null;


if($action === "new"){
    if (Plan::registrar($nombre, $fecha))
        header("location: ../dashboard/adminPage.php?content=up_indiv&ok=true");
    else
        header("location: ../dashboard/adminPage.php?content=up_indiv&ok=false");

    }
    
    if($action === "update"){
        if($nombre)$plan->setNombre($nombre);
        if($fecha)$plan->setFecha($fecha);
    
        if($plan->update())
            header("location: ../dashboard/adminPage.php?content=admin&table=planes&update=true");
        else
            header("location: ../dashboard/adminPage.php?content=admin&table=planes&update=false");
    }
    }
