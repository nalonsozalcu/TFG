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
    $id_1 = $_POST["id_1"] != "" ? $_POST["id_1"] : null;
    $favorito = Usuario::get_favorito_by_id($id_1);
	if($favorito){?>
		<?php foreach($favoritos as $favorito){
		if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
                                                        $id_act_1 = $actividad->id();
														$tipo_act_1 = $actividad->nombre();
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														$id_act_1 = $actividad->id();
														$tipo_act_1 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														$id_act_1 = $actividad->id();
														$tipo_act_1 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														$id_act_1 = $actividad->id();
														$tipo_act_1 = $actividad->nombre();
														}
													 } 
										}
                                        $id_2 = $_POST["id_2"] != "" ? $_POST["id_2"] : null;
    $favorito = Usuario::get_favorito_by_id($id_2);
	if($favorito){?>
		<?php foreach($favoritos as $favorito){
		if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
                                                        $id_act_2 = $actividad->id();
														$tipo_act_2 = $actividad->nombre();
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														$id_act_2 = $actividad->id();
														$tipo_act_2 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														$id_act_2 = $actividad->id();
														$tipo_act_2 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														$id_act_2 = $actividad->id();
														$tipo_act_2 = $actividad->nombre();
														}
													 } 
										}
                                        $id_3 = $_POST["id_3"] != "" ? $_POST["id_3"] : null;
    $favorito = Usuario::get_favorito_by_id($id_3);
	if($favorito){?>
		<?php foreach($favoritos as $favorito){
		if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
                                                        $id_act_3 = $actividad->id();
														$tipo_act_3 = $actividad->nombre();
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														$id_act_3 = $actividad->id();
														$tipo_act_3 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														$id_act_3 = $actividad->id();
														$tipo_act_3 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														$id_act_3 = $actividad->id();
														$tipo_act_3 = $actividad->nombre();
														}
													 } 
										}
                                        $id_4 = $_POST["id_4"] != "" ? $_POST["id_4"] : null;
    $favorito = Usuario::get_favorito_by_id($id_4);
	if($favorito){?>
		<?php foreach($favoritos as $favorito){
		if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
                                                        $id_act_4 = $actividad->id();
														$tipo_act_4 = $actividad->nombre();
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														$id_act_4 = $actividad->id();
														$tipo_act_4 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														$id_act_4 = $actividad->id();
														$tipo_act_4 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														$id_act_4 = $actividad->id();
														$tipo_act_4 = $actividad->nombre();
														}
													 } 
										}
                                        $id_5 = $_POST["id_5"] != "" ? $_POST["id_5"] : null;
    $favorito = Usuario::get_favorito_by_id($id_5);
	if($favorito){?>
		<?php foreach($favoritos as $favorito){
		if($favorito["tipo_actividad"] == "museo"){
														$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
                                                        $id_act_5 = $actividad->id();
														$tipo_act_5 = $actividad->nombre();
														
													}
													if($favorito["tipo_actividad"] == "restaurante"){
														$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
														$id_act_5 = $actividad->id();
														$tipo_act_5 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "monumento"){ 
														$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
														$id_act_5 = $actividad->id();
														$tipo_act_5 = $actividad->nombre();
														}
													if($favorito["tipo_actividad"] == "evento") {
														$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
														$id_act_5 = $actividad->id();
														$tipo_act_5 = $actividad->nombre();
														}
													 } 
										}
$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;
$hora_act_1 = $_POST["hora_act_1"] != "" ? $_POST["hora_act_1"] : null;

$hora_act_2 = $_POST["hora_act_2"] != "" ? $_POST["hora_act_2"] : null;

$hora_act_3 = $_POST["hora_act_3"] != "" ? $_POST["hora_act_3"] : null;

$hora_act_4 = $_POST["hora_act_4"] != "" ? $_POST["hora_act_4"] : null;

$hora_act_5 = $_POST["hora_act_5"] != "" ? $_POST["hora_act_5"] : null;

$fecha = $_POST["fecha"] != "" ? $_POST["fecha"] : null;


if($action === "new"){
    if (Plan::registrar($nombre, $descripcion, $hora_act_1, $id_act_1, $tipo_act_1, $hora_act_2, $id_act_2, $tipo_act_2, $hora_act_3, $id_act_3, $tipo_act_3, $hora_act_4, $id_act_4, $tipo_act_4, $hora_act_5, $id_act_5, $tipo_act_5, $fecha))
        header("location: ../dashboard/adminPage.php?content=up_indiv&ok=true");
    else
        header("location: ../dashboard/adminPage.php?content=up_indiv&ok=false");

    }
    
    if($action === "update"){
        if($nombre)$plan->setNombre($nombre);
        if($descripcion)$plan->setDescripcion($descripcion);
        if($hora_act_1)$plan->setHora_act_1($hora_act_1);
        if($id_act_1)$plan->setId_act_1($id_act_1);
        if($tipo_act_1)$plan->setTipo_act_1($tipo_act_1);
        if($hora_act_2)$plan->setHora_act_2($hora_act_2);
        if($id_act_2)$plan->setId_act_2($id_act_2);
        if($tipo_act_2)$plan->setTipo_act_2($tipo_act_2);
        if($hora_act_3)$plan->setHora_act_3($hora_act_3);
        if($id_act_3)$plan->setId_act_3($id_act_3);
        if($tipo_act_3)$plan->setTipo_act_3($tipo_act_3);
        if($hora_act_4)$plan->setHora_act_4($hora_act_4);
        if($id_act_4)$plan->setId_act_4($id_act_4);
        if($tipo_act_4)$plan->setTipo_act_4($tipo_act_4);
        if($hora_act_5)$plan->setHora_act_5($hora_act_5);
        if($id_act_5)$plan->setId_act_5($id_act_5);
        if($tipo_act_5)$plan->setTipo_act_5($tipo_act_5);
        if($fecha)$plan->setFecha($fecha);
    
        if($plan->update())
            header("location: ../dashboard/adminPage.php?content=admin&table=planes&update=true");
        else
            header("location: ../dashboard/adminPage.php?content=admin&table=planes&update=false");
    }
    }
