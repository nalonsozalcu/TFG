<?php require_once '../config.php'; ?>
<?php require_once '../classes/Museo.php'; ?>
<?php require_once '../classes/Restaurante.php'; ?>
<?php require_once '../classes/Evento.php'; ?>
<?php require_once '../classes/Monumento.php'; ?>
<!DOCTYPE html>
<?php 
if(isset($_GET["table"])){
	$nombre =  $_GET["table"];
	if($nombre == "museo") {$icon = '<i class="fa-solid fa-landmark"></i>'; $actividades = Museo::get_all_museos();}
	if($nombre == "restaurante") { $icon = '<i class="fa-solid fa-utensils"></i>'; $actividades = Restaurante::get_all_restaurantes();}
	if($nombre == "monumento") { $icon = '<i class="fa-solid fa-monument"></i>'; $actividades = Monumento::get_all_monumentos();}
	if($nombre == "evento") { $icon = '<i class="fa-regular fa-calendar-check"></i>'; $actividades = Evento::get_all_eventos();}
}
?>
<head>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
<link rel="stylesheet" href="../assets/css/main.css">

<style>
	.marker {
	background-image: url('../assets/img/localizacion.png');
	background-size: cover;
	width: 20px;
	height: 32px;
	cursor: pointer;
	}
	.mapboxgl-popup {
	max-width: 200px;
	}
	.mapboxgl-popup-content {
	text-align: center;
	font-family: 'Open Sans', sans-serif;
	}
</style>
</head>
<body>
	<div id='map' style='width: 960px; height: 540px;'></div>
	<div id="info"></div>
	<script>
		mapboxgl.accessToken = 'pk.eyJ1IjoiZXZpbG5hcHNpcyIsImEiOiJjazM2MHZtbXcwNm11M25reGY3NW1zMHhhIn0.FoA72lWHT4bXe2jxfH5uvQ';

		//Creacion Mapa
		var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v11',
		center: [-3.70256, 40.4165], // starting position
		zoom: 10,
		});

		map.addControl(new MapboxGeocoder({
			accessToken: mapboxgl.accessToken
		}));

		//Botones de geolocalizacion y vista del mapa
		map.addControl(new mapboxgl.NavigationControl());
		map.addControl(new mapboxgl.FullscreenControl());

		// Initialize the GeolocateControl. 
		const geolocate = new mapboxgl.GeolocateControl({
			positionOptions: {
			enableHighAccuracy: true
			},
			trackUserLocation: true
		});

		map.addControl(geolocate);

		// Set an event listener that fires when a trackuserlocationstart event occurs.
		geolocate.on('trackuserlocationstart', () => {
		console.log('A trackuserlocationstart event has occurred.');
		});


		//Añadir marcadores segun tipo
		<?php 
			if($actividades):
				foreach ($actividades as $j => $value):
					if($actividades[$j]["longitud"] != "" &&  $actividades[$j]["latitud"]){
						if($nombre  == 'restaurante'){
							$valoracion = Restaurante::get_global_valoracion($actividades[$j]["id"]);
							$longitud = $actividades[$j]["longitud"];
							$latitud = $actividades[$j]["latitud"];
						}else{
							if($nombre  == 'museo') $valoracion = Museo::get_global_valoracion($actividades[$j]["id"]);
							if($nombre  == 'monumento') $valoracion = Monumento::get_global_valoracion($actividades[$j]["id"]);
							if($nombre  == 'evento') $valoracion = Evento::get_global_valoracion($actividades[$j]["id"]);

							$longitud = str_replace ( ".", '', $actividades[$j]["longitud"]);
							$prefix = substr($longitud, 0, 2);
							$subfix = substr($longitud, 2, 10);
							$longitud = $prefix.".".$subfix;
							$latitud = str_replace ( ".", '', $actividades[$j]["latitud"]);
							$prefix = substr($latitud, 0, 2);
							$subfix = substr($latitud, 2, 10);
							$latitud = $prefix.".".$subfix;
						}
						?>
						var ele = document.createElement('div');
						ele.className = 'marker';
						new mapboxgl.Marker(ele)
						.setLngLat([<?php echo($longitud) ?>, <?php echo($latitud) ?>])
						.setPopup(
							new mapboxgl.Popup({ offset: 25 }) // add popups
							.setHTML(
							'<?php echo('<h4><a href="actividadPage.php?content='.$nombre.'&id='.$actividades[$j]["id"].'" class="ms-3 card-link" style="text-decoration:none">'.$icon.'</a></h4>'); ?>' +  
							'<h4>' + "<?php echo($actividades[$j]["nombre"]) ?>" + '</h4>' + 
							'<?php 
							if($valoracion){
								for($e=1; $e < 6; $e++){
									if($e <= $valoracion){
										echo('<i class="bi bi-star-fill text-warning ms-1"></i>');
									}else{
										echo('<i class="bi bi-star-fill ms-1"></i>');
									}
								}
							}?>'
							)
						)
						.addTo(map);
		<?php } endforeach; 
			endif;
		?> 
	</script>
</body>
</html>