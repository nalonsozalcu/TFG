<?php
require_once '../config.php';
require_once '../classes/Plan.php';
require_once '../classes/Evento.php';
require_once '../classes/Restaurante.php';
require_once '../classes/Monumento.php';
require_once '../classes/Museo.php';

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
if($action === "generate"){
	$fecha = $_POST["fecha"] != "" ? $_POST["fecha"] : null;
	$nombre = "Plan automático " . rand();
	$descripcion = "Plan generado automaticamente.";

	$tipos = ["Museo", "Evento", "Restaurante", "Monumento"];
	$horas_1 = ["09:00", "10:00", "11:00", "12:00"];
	$horas_2 = ["12:30", "13:00", "13:30", "14:00"];
	$horas_3 = ["14:30", "15:00", "15:30", "16:00"];
	$horas_4 = ["17:00", "17:30", "18:00", "18:30"];
	$horas_5 = ["19:00", "20:00", "21:00", "22:00"];

	$max_museo = 69;
	$max_restaurante = 986;
	$max_monumento = 1845;
	$max_evento = 1000;

	$num_act = $_POST["num_act"] != "" ? $_POST["num_act"] : null;
	$tend = $_POST["flexRadioDefault"] == "tend" ? true : false;
	$favs = $_POST["flexRadioDefault"] == "favs" ? true : false;
	$cats = $_POST["flexRadioDefault"] == "cats" ? true : false;
	// $valoracion_check = isset($_POST["val_check"]) ? true : false;
	// $valoracion = $_POST["valoracion"] != "" ? $_POST["valoracion"] : null;

	if($favs){
		$favoritos = Usuario::get_favoritos_by_id($_SESSION["idUsuario"]);
		$indices = array_rand($favoritos, $num_act);
	}else if($tend){
		$conn = Aplicacion::getConexionBD();
		$query = sprintf("SELECT * FROM `tendencias` WHERE `tipo_actividad` != 'planes'");
		$rs = $conn->query($query);
		$tendencias = $rs->fetch_all(MYSQLI_ASSOC);
		$indices = array_rand($tendencias, $num_act);
	}
	else if($cats){
		$cat_museo = Usuario::get_categorias_by_id($_SESSION["idUsuario"], "museos");
		$cat_restaurante = Usuario::get_categorias_by_id($_SESSION["idUsuario"], "restaurantes");
		$cat_monumento = Usuario::get_categorias_by_id($_SESSION["idUsuario"], "monumentos");
		$cat_evento = Usuario::get_categorias_by_id($_SESSION["idUsuario"], "eventos");
	}

	if($favs){
		if($num_act == 1){
			$favorito = $favoritos[$indices];
		}else{
			$favorito = $favoritos[$indices[0]];
		}
		if($favorito["tipo_actividad"] == "museo"){
			$tipo = "Museo";
			$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
		}
		if($favorito["tipo_actividad"] == "restaurante"){
			$tipo = "Restaurante";
			$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
		}
		if($favorito["tipo_actividad"] == "monumento"){ 
			$tipo = "Monumento";
			$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
		}
		if($favorito["tipo_actividad"] == "evento") {
			$tipo = "Evento";
			$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
		}
		$id_act_1 = $actividad->id();
		$tipo_act_1 = $tipo;
	}
	else if($tend){
		if($num_act == 1){
			$tendencia = $tendencias[$indices];
		}else{
			$tendencia = $tendencias[$indices[0]];
		}
		if($tendencia["tipo_actividad"] == "museos"){
			$tipo = "Museo";
			$actividad = Museo::get_museo_by_id($tendencia["id_actividad"]);
		}
		if($tendencia["tipo_actividad"] == "restaurantes"){
			$tipo = "Restaurante";
			$actividad = Restaurante::get_restaurante_by_id($tendencia["id_actividad"]);
		}
		if($tendencia["tipo_actividad"] == "monumentos"){ 
			$tipo = "Monumento";
			$actividad = Monumento::get_monumento_by_id($tendencia["id_actividad"]);
		}
		if($tendencia["tipo_actividad"] == "eventos") {
			$tipo = "Evento";
			$actividad = Evento::get_evento_by_id($tendencia["id_actividad"]);
		}
		$id_act_1 = $actividad->id();
		$tipo_act_1 = $tipo;
	}
	else if($cats){
		$tipo_act_1 = $tipos[array_rand($tipos)];
		
		if($tipo_act_1 == "Museo"){ 
			$has_cat = false;
			while(!$has_cat){
				$id_act_1 = random_int(1, $max_museo);
				foreach($cat_museo as $id_cat){
					if(Museo::has_categoria_by_id($id_act_1, $id_cat)){
						$has_cat = true;
						break;
					}
				}
			}
		}
		if($tipo_act_1 == "Restaurante") {
			$has_cat = false;
			while(!$has_cat){
				$id_act_1 = random_int(1, $max_restaurante);
				foreach($cat_museo as $id_cat){
					if(Restaurante::has_categoria_by_id($id_act_1, $id_cat)){
						$has_cat = true;
						break;
					}
				}
			}
		}
		if($tipo_act_1 == "Monumento"){
			$has_cat = false;
			while(!$has_cat){
				$id_act_1 = random_int(1, $max_monumento);
				foreach($cat_museo as $id_cat){
					if(Monumento::has_categoria_by_id($id_act_1, $id_cat)){
						$has_cat = true;
						break;
					}
				}
			}
		}
		if($tipo_act_1 == "Evento"){
			$has_cat = false;
			while(!$has_cat){
				$id_act_1 = random_int(1, $max_evento);
				foreach($cat_museo as $id_cat){
					if(Evento::has_categoria_by_id($id_act_1, $id_cat)){
						$has_cat = true;
						break;
					}
				}
			}
		}
	}else{
		$tipo_act_1 = $tipos[array_rand($tipos)];

		if($tipo_act_1 == "Museo") $id_act_1 = random_int(1, $max_museo);
		if($tipo_act_1 == "Restaurante") $id_act_1 = random_int(1, $max_restaurante);
		if($tipo_act_1 == "Monumento") $id_act_1 = random_int(1, $max_monumento);
		if($tipo_act_1 == "Evento") $id_act_1 = random_int(1, $max_evento);
	}

	$hora_act_1 = $horas_1[array_rand($horas_1)];

	if($num_act > 1){
		if($favs){
			$favorito = $favoritos[$indices[1]];
			if($favorito["tipo_actividad"] == "museo"){
				$tipo = "Museo";
				$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "restaurante"){
				$tipo = "Restaurante";
				$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "monumento"){ 
				$tipo = "Monumento";
				$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "evento") {
				$tipo = "Evento";
				$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
			}
			$id_act_2 = $actividad->id();
			$tipo_act_2 = $tipo;
		}else if($tend){
			$tendencia = $tendencias[$indices[1]];
			if($tendencia["tipo_actividad"] == "museos"){
				$tipo = "Museo";
				$actividad = Museo::get_museo_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "restaurantes"){
				$tipo = "Restaurante";
				$actividad = Restaurante::get_restaurante_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "monumentos"){ 
				$tipo = "Monumento";
				$actividad = Monumento::get_monumento_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "eventos") {
				$tipo = "Evento";
				$actividad = Evento::get_evento_by_id($tendencia["id_actividad"]);
			}
			$id_act_2 = $actividad->id();
			$tipo_act_2 = $tipo;
		}else if($cats){
			$tipo_act_2 = $tipos[array_rand($tipos)];
			
			if($tipo_act_2 == "Museo"){ 
				$has_cat = false;
				while(!$has_cat){
					$id_act_2 = random_int(1, $max_museo);
					foreach($cat_museo as $id_cat){
						if(Museo::has_categoria_by_id($id_act_2, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_2 == "Restaurante") {
				$has_cat = false;
				while(!$has_cat){
					$id_act_2 = random_int(1, $max_restaurante);
					foreach($cat_museo as $id_cat){
						if(Restaurante::has_categoria_by_id($id_act_2, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_2 == "Monumento"){
				$has_cat = false;
				while(!$has_cat){
					$id_act_2 = random_int(1, $max_monumento);
					foreach($cat_museo as $id_cat){
						if(Monumento::has_categoria_by_id($id_act_2, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_2 == "Evento"){
				$has_cat = false;
				while(!$has_cat){
					$id_act_2 = random_int(1, $max_evento);
					foreach($cat_museo as $id_cat){
						if(Evento::has_categoria_by_id($id_act_2, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
		}else{
			$tipo_act_2 = $tipos[array_rand($tipos)];
			if($tipo_act_2 == "Museo") $id_act_2 = random_int(1, $max_museo);
			if($tipo_act_2 == "Restaurante") $id_act_2 = random_int(1, $max_restaurante);
			if($tipo_act_2 == "Monumento") $id_act_2 = random_int(1, $max_monumento);
			if($tipo_act_2 == "Evento") $id_act_2 = random_int(1, $max_evento);
		}
		$hora_act_2 = $horas_2[array_rand($horas_2)];

	}else{
		$id_act_2 = 0;
		$tipo_act_2 = "";
		$hora_act_2 = "";
	}

	if($num_act > 2){
		if($favs){
			$favorito = $favoritos[$indices[2]];
			if($favorito["tipo_actividad"] == "museo"){
				$tipo = "Museo";
				$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "restaurante"){
				$tipo = "Restaurante";
				$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "monumento"){ 
				$tipo = "Monumento";
				$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "evento") {
				$tipo = "Evento";
				$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
			}
			$id_act_3 = $actividad->id();
			$tipo_act_3 = $tipo;
		}else if($tend){
			$tendencia = $tendencias[$indices[2]];
			if($tendencia["tipo_actividad"] == "museos"){
				$tipo = "Museo";
				$actividad = Museo::get_museo_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "restaurantes"){
				$tipo = "Restaurante";
				$actividad = Restaurante::get_restaurante_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "monumentos"){ 
				$tipo = "Monumento";
				$actividad = Monumento::get_monumento_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "eventos") {
				$tipo = "Evento";
				$actividad = Evento::get_evento_by_id($tendencia["id_actividad"]);
			}
			$id_act_3 = $actividad->id();
			$tipo_act_3 = $tipo;
		}
		else if($cats){
			$tipo_act_3 = $tipos[array_rand($tipos)];
			
			if($tipo_act_3 == "Museo"){ 
				$has_cat = false;
				while(!$has_cat){
					$id_act_3 = random_int(1, $max_museo);
					foreach($cat_museo as $id_cat){
						if(Museo::has_categoria_by_id($id_act_3, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_3 == "Restaurante") {
				$has_cat = false;
				while(!$has_cat){
					$id_act_3 = random_int(1, $max_restaurante);
					foreach($cat_museo as $id_cat){
						if(Restaurante::has_categoria_by_id($id_act_3, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_3 == "Monumento"){
				$has_cat = false;
				while(!$has_cat){
					$id_act_3 = random_int(1, $max_monumento);
					foreach($cat_museo as $id_cat){
						if(Monumento::has_categoria_by_id($id_act_3, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_3 == "Evento"){
				$has_cat = false;
				while(!$has_cat){
					$id_act_3 = random_int(1, $max_evento);
					foreach($cat_museo as $id_cat){
						if(Evento::has_categoria_by_id($id_act_3, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
		}else{
			$tipo_act_3 = $tipos[array_rand($tipos)];
			if($tipo_act_3 == "Museo") $id_act_3 = random_int(1, $max_museo);
			if($tipo_act_3 == "Restaurante") $id_act_3 = random_int(1, $max_restaurante);
			if($tipo_act_3 == "Monumento") $id_act_3 = random_int(1, $max_monumento);
			if($tipo_act_3 == "Evento") $id_act_3 = random_int(1, $max_evento);
		}
		$hora_act_3 = $horas_3[array_rand($horas_3)];
	}else{
		$id_act_3 = 0;
		$tipo_act_3 = "";
		$hora_act_3 = "";
	}

	if($num_act > 3){
		if($favs){
			$favorito = $favoritos[$indices[3]];
			if($favorito["tipo_actividad"] == "museo"){
				$tipo = "Museo";
				$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "restaurante"){
				$tipo = "Restaurante";
				$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "monumento"){ 
				$tipo = "Monumento";
				$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "evento") {
				$tipo = "Evento";
				$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
			}
			$id_act_4 = $actividad->id();
			$tipo_act_4 = $tipo;
		}else if($tend){
			$tendencia = $tendencias[$indices[3]];
			if($tendencia["tipo_actividad"] == "museos"){
				$tipo = "Museo";
				$actividad = Museo::get_museo_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "restaurantes"){
				$tipo = "Restaurante";
				$actividad = Restaurante::get_restaurante_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "monumentos"){ 
				$tipo = "Monumento";
				$actividad = Monumento::get_monumento_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "eventos") {
				$tipo = "Evento";
				$actividad = Evento::get_evento_by_id($tendencia["id_actividad"]);
			}
			$id_act_4 = $actividad->id();
			$tipo_act_4 = $tipo;
		}
		else if($cats){
			$tipo_act_4 = $tipos[array_rand($tipos)];
			
			if($tipo_act_4 == "Museo"){ 
				$has_cat = false;
				while(!$has_cat){
					$id_act_4 = random_int(1, $max_museo);
					foreach($cat_museo as $id_cat){
						if(Museo::has_categoria_by_id($id_act_4, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_4 == "Restaurante") {
				$has_cat = false;
				while(!$has_cat){
					$id_act_4 = random_int(1, $max_restaurante);
					foreach($cat_museo as $id_cat){
						if(Restaurante::has_categoria_by_id($id_act_4, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_4 == "Monumento"){
				$has_cat = false;
				while(!$has_cat){
					$id_act_4 = random_int(1, $max_monumento);
					foreach($cat_museo as $id_cat){
						if(Monumento::has_categoria_by_id($id_act_4, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_4 == "Evento"){
				$has_cat = false;
				while(!$has_cat){
					$id_act_4 = random_int(1, $max_evento);
					foreach($cat_museo as $id_cat){
						if(Evento::has_categoria_by_id($id_act_4, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
		}else{
			$tipo_act_4 = $tipos[array_rand($tipos)];
			if($tipo_act_4 == "Museo") $id_act_4 = random_int(1, $max_museo);
			if($tipo_act_4 == "Restaurante") $id_act_4 = random_int(1, $max_restaurante);
			if($tipo_act_4 == "Monumento") $id_act_4 = random_int(1, $max_monumento);
			if($tipo_act_4 == "Evento") $id_act_4 = random_int(1, $max_evento);
		}
		$hora_act_4 = $horas_4[array_rand($horas_4)];
	} else {
		$id_act_4 = 0;
		$tipo_act_4 = "";
		$hora_act_4 = "";
	}

	if($num_act > 4){
		if($favs){
			$favorito = $favoritos[$indices[4]];
			if($favorito["tipo_actividad"] == "museo"){
				$tipo = "Museo";
				$actividad = Museo::get_museo_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "restaurante"){
				$tipo = "Restaurante";
				$actividad = Restaurante::get_restaurante_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "monumento"){ 
				$tipo = "Monumento";
				$actividad = Monumento::get_monumento_by_id($favorito["id_actividad"]);
			}
			if($favorito["tipo_actividad"] == "evento") {
				$tipo = "Evento";
				$actividad = Evento::get_evento_by_id($favorito["id_actividad"]);
			}
			$id_act_5 = $actividad->id();
			$tipo_act_5 = $tipo;
		}else if($tend){
			$tendencia = $tendencias[$indices[4]];
			if($tendencia["tipo_actividad"] == "museos"){
				$tipo = "Museo";
				$actividad = Museo::get_museo_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "restaurantes"){
				$tipo = "Restaurante";
				$actividad = Restaurante::get_restaurante_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "monumentos"){ 
				$tipo = "Monumento";
				$actividad = Monumento::get_monumento_by_id($tendencia["id_actividad"]);
			}
			if($tendencia["tipo_actividad"] == "eventos") {
				$tipo = "Evento";
				$actividad = Evento::get_evento_by_id($tendencia["id_actividad"]);
			}
			$id_act_5 = $actividad->id();
			$tipo_act_5 = $tipo;
		}else if($cats){
			$tipo_act_5 = $tipos[array_rand($tipos)];
			
			if($tipo_act_5 == "Museo"){ 
				$has_cat = false;
				while(!$has_cat){
					$id_act_5 = random_int(1, $max_museo);
					foreach($cat_museo as $id_cat){
						if(Museo::has_categoria_by_id($id_act_5, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_5 == "Restaurante") {
				$has_cat = false;
				while(!$has_cat){
					$id_act_5 = random_int(1, $max_restaurante);
					foreach($cat_museo as $id_cat){
						if(Restaurante::has_categoria_by_id($id_act_5, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_5 == "Monumento"){
				$has_cat = false;
				while(!$has_cat){
					$id_act_5 = random_int(1, $max_monumento);
					foreach($cat_museo as $id_cat){
						if(Monumento::has_categoria_by_id($id_act_5, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
			if($tipo_act_5 == "Evento"){
				$has_cat = false;
				while(!$has_cat){
					$id_act_5 = random_int(1, $max_evento);
					foreach($cat_museo as $id_cat){
						if(Evento::has_categoria_by_id($id_act_5, $id_cat)){
							$has_cat = true;
							break;
						}
					}
				}
			}
		}else{
			$tipo_act_5 = $tipos[array_rand($tipos)];
			if($tipo_act_5 == "Museo") $id_act_5 = random_int(1, $max_museo);
			if($tipo_act_5 == "Restaurante") $id_act_5 = random_int(1, $max_restaurante);
			if($tipo_act_5 == "Monumento") $id_act_5 = random_int(1, $max_monumento);
			if($tipo_act_5 == "Evento") $id_act_5 = random_int(1, $max_evento);
		}
		$hora_act_5 = $horas_5[array_rand($horas_5)];
	} else {
		$id_act_5 = 0;
		$tipo_act_5 = "";
		$hora_act_5 = "";
	}

	$id = Plan::registrar($nombre, $descripcion, $hora_act_1, $id_act_1, $tipo_act_1, $hora_act_2, $id_act_2, $tipo_act_2, $hora_act_3, $id_act_3, $tipo_act_3, $hora_act_4, $id_act_4, $tipo_act_4, $hora_act_5, $id_act_5, $tipo_act_5, $fecha);
	header("location: ../dashboard/actividadPage.php?content=plan&id=$id");
}

else{
	

	$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
	$descripcion = $_POST["descripcion"] != "" ? $_POST["descripcion"] : null;

	$id_act_1 = $_POST["id_1"];
	$tipo_act_1 = $_POST["tipo_1"];
	$hora_act_1 = $_POST["hora_act_1"];

	$id_act_2 = $_POST["id_2"];
	$tipo_act_2 = $_POST["tipo_2"];
	$hora_act_2 = $_POST["hora_act_2"];

	$id_act_3 = $_POST["id_3"];
	$tipo_act_3 = $_POST["tipo_3"];
	$hora_act_3 = $_POST["hora_act_3"];

	$id_act_4 = $_POST["id_4"];
	$tipo_act_4 = $_POST["tipo_4"];
	$hora_act_4 = $_POST["hora_act_4"];

	$id_act_5 = $_POST["id_5"];
	$tipo_act_5 = $_POST["tipo_5"];
	$hora_act_5 = $_POST["hora_act_5"];

	$fecha = $_POST["fecha"] != "" ? $_POST["fecha"] : null;


	if($action === "new"){
		$id = Plan::registrar($nombre, $descripcion, $hora_act_1, $id_act_1, $tipo_act_1, $hora_act_2, $id_act_2, $tipo_act_2, $hora_act_3, $id_act_3, $tipo_act_3, $hora_act_4, $id_act_4, $tipo_act_4, $hora_act_5, $id_act_5, $tipo_act_5, $fecha);
		header("location: ../dashboard/actividadPage.php?content=plan&id=$id");

	}
	if($action === "update"){
		if($nombre){$plan->setNombre($nombre);}
		if($descripcion){$plan->setDescripcion($descripcion);}
		if($fecha)$plan->setFecha($fecha);
		$plan->setHora_act_1($hora_act_1);
		$plan->setId_act_1($id_act_1);
		$plan->setTipo_act_1($tipo_act_1);
		$plan->setHora_act_2($hora_act_2);
		$plan->setId_act_2($id_act_2);
		$plan->setTipo_act_2($tipo_act_2);
		$plan->setHora_act_3($hora_act_3);
		$plan->setId_act_3($id_act_3);
		$plan->setTipo_act_3($tipo_act_3);
		$plan->setHora_act_4($hora_act_4);
		$plan->setId_act_4($id_act_4);
		$plan->setTipo_act_4($tipo_act_4);
		$plan->setHora_act_5($hora_act_5);
		$plan->setId_act_5($id_act_5);
		$plan->setTipo_act_5($tipo_act_5);

		if($plan->update())
			header("location: ../dashboard/actividadPage.php?content=plan&id=$id");
		else
			header("location: ../dashboard/actividadPage.php?content=plan&id=$id");
	}
}