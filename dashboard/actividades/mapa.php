<?php require_once '../config.php'; ?>
<?php require_once '../classes/Museo.php'; ?>
<?php require_once '../classes/Restaurante.php'; ?>
<?php require_once '../classes/Evento.php'; ?>
<?php require_once '../classes/Monumento.php'; ?>
<!DOCTYPE html>
<?php 
	if(isset($_GET["table"])){
		$nombre =  $_GET["table"];
  }
?>
<head>
<title></title>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
<link rel="stylesheet" href="../assets/css/main.css">

<style>
    .markerMuseo {
      background-image: url('mapbox-icon.png');
      background-size: cover;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
    }
    .markerRestaurante {
      background-image: url('mapbox-icon.png');
      background-size: cover;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
    }
    .markerMonumento {
      background-image: url('mapbox-icon.png');
      background-size: cover;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
    }
    .markerEvento {
      background-image: url('mapbox-icon.png');
      background-size: cover;
      width: 50px;
      height: 50px;
      border-radius: 50%;
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

//Conseguir las coordenadas del raton
//map.on('mousemove', function (e) {
//document.getElementById('info').innerHTML =
//JSON.stringify(e.lngLat.wrap());
//});
map.addControl(new MapboxGeocoder({
    accessToken: mapboxgl.accessToken
}));

//Botones de geolocalizacion y vista del mapa
map.addControl(new mapboxgl.NavigationControl());
map.addControl(new mapboxgl.FullscreenControl());

//function gotPosition(pos) {
  // imprime e.g.  {coords: {lat: -33, lng: -73, accuracy: 1 }}
 // console.log({
  //  pos
 // });
//}
//function gotError(err) {
 // console.warn(err);
//}

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

document.addEventListener('DOMContentLoaded', () => {
  navigator.geolocation.getCurrentPosition(gotPosition, gotPosition, {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  });
});

//Añadir marcadores segun tipo
<?php 

if($nombre  == 'restaurante'){
  
      $restaurantes = Restaurante::get_all_restaurantes();
      if($restaurantes):
        foreach ($restaurantes as $j => $value):?>
      var ele = document.createElement('div');
      ele.className = 'markerRestaurante';


          new mapboxgl.Marker(ele)
          .setLngLat([<?php echo($restaurantes[$j]["longitud"]) ?>, <?php echo($restaurantes[$j]["latitud"]) ?>])
          .setPopup(
            new mapboxgl.Popup({ offset: 25 }) // add popups
            .setHTML(
              '<?php echo('<h4><a href="actividadPage.php?content=restaurante&id='.$restaurantes[$j]["id"].'" class="ms-3 card-link" style="text-decoration:none"><i class="fa-solid fa-utensils"></i></a></h4>'); ?>' +  
              '<h4>' +
                "<?php echo($restaurantes[$j]["nombre"]) ?>" +
                  '</h4>' + '<?php
										if(Usuario::is_favorito($_SESSION["idUsuario"], "restaurante", $restaurantes[$j]["id"])){ 
											echo('<button class="btn ms-1" onclick="'.Usuario::delete_favorito($restaurantes[$j]["id"]).'"><i class="bi bi-suit-heart-fill" style="color: red;"></i></button>');
										}else{
                      $tipo = 'restaurante';
                      echo('<button class="btn ms-1" onclick="'.Usuario::new_favorito($_SESSION["idUsuario"], $tipo, $restaurantes[$j]["id"]).'"><i class="bi bi-suit-heart" style="color: red;"></i></button>');
										}
										?>'
          
              )
          )
          .addTo(map);
        
        <?php endforeach; 
      endif;
 
}
if($nombre == 'museo'){
  

    $museos = Museo::get_all_museos();
    if($museos):
    foreach ($museos as $i => $value):
    if($museos[$i]["longitud"] != "" && $museos[$i]["latitud"] != ""){?>
    var el = document.createElement('div');
    el.className = 'markerMuseo';


    <?php 
    $longitud = str_replace ( ".", '', $museos[$i]["longitud"]);
    $prefix = substr($longitud, 0, 2);
    $subfix = substr($longitud, 2, 12);
    $longitud = $prefix.".".$subfix;
    $latitud = str_replace ( ".", '', $museos[$i]["latitud"]);
    $prefix = substr($latitud, 0, 2);
    $subfix = substr($latitud, 2, 10);
    $latitud = $prefix.".".$subfix;

    ?>


    new mapboxgl.Marker(el)
    .setLngLat([<?php echo($longitud) ?>, <?php echo($latitud) ?>])
    .setPopup(
    new mapboxgl.Popup({ offset: 25 }) // add popups
    .setHTML(
    '<h4>' +
    "<?php echo($museos[$i]["nombre"]) ?>" +
    '</h4>'
    )
    )
    .addTo(map);

    <?php }
    endforeach; 
    endif; 

  } 
  if($nombre == 'monumento'){
  
      $monumentos = Monumento::get_all_monumentos();
      if($monumentos):
        foreach ($monumentos as $k => $value):
          if($monumentos[$k]["longitud"] != "" && $monumentos[$k]["latitud"] != ""){?>
      var elem = document.createElement('div');
      elem.className = 'markerMonumento';

      <?php
							$longitud = str_replace ( ".", '', $monumentos[$k]["longitud"]);
							$prefix = substr($longitud, 0, 2);
							$subfix = substr($longitud, 2, 12);
							$longitud = $prefix.".".$subfix;
							$latitud = str_replace ( ".", '', $monumentos[$k]["latitud"]);
							$prefix = substr($latitud, 0, 2);
							$subfix = substr($latitud, 2, 10);
							$latitud = $prefix.".".$subfix;?>

          new mapboxgl.Marker(elem)
          .setLngLat([<?php echo($longitud) ?>, <?php echo($latitud) ?>])
          .setPopup(
            new mapboxgl.Popup({ offset: 25 }) // add popups
            .setHTML(
                '<h4>' +
                "<?php echo($monumentos[$k]["nombre"]) ?>" +
                  '</h4>'
              )
          )
          .addTo(map);
        
        <?php }
        endforeach; 
        endif;
        
        
      }
      if($nombre == 'evento'){
        $eventos = Evento::get_all_eventos();
      if($eventos):
        foreach ($eventos as $h => $value):
          if($eventos[$h]["longitud"] != "" && $eventos[$h]["latitud"] != ""){?>
      var eleme = document.createElement('div');
      eleme.className = 'markerEvento';

      <?php 
							$longitud = str_replace ( ".", '', $eventos[$h]["longitud"]);
							$prefix = substr($longitud, 0, 2);
							$subfix = substr($longitud, 2, 12);
							$longitud = $prefix.".".$subfix;
							$latitud = str_replace ( ".", '', $eventos[$h]["latitud"]);
							$prefix = substr($latitud, 0, 2);
							$subfix = substr($latitud, 2, 10);
							$latitud = $prefix.".".$subfix;?>

          new mapboxgl.Marker(eleme)
          .setLngLat([<?php echo($longitud) ?>, <?php echo($latitud) ?>])
          .setPopup(
            new mapboxgl.Popup({ offset: 25 }) // add popups
            .setHTML(
                '<h4>' +
                "<?php echo($eventos[$h]["nombre"]) ?>" +
                  '</h4>'
              )
          )
          .addTo(map);
        
        <?php }
         endforeach; 
      endif;
    }
    ?> 


      
</script>

</body>
</html>