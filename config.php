<?php
  // Varios defines para los parámetros de configuración de acceso a la BD y la URL desde la que se sirve la aplicación
  define('BD_HOST', 'localhost');
  define('BD_NAME', 'planificador');
  define('BD_USER', 'planways');
  define('BD_PASS', 'planways');
  define('RUTA_APP', __DIR__);
  define('INSTALADA', true );


  require_once RUTA_APP.'/classes/Aplicacion.php';

  if (! INSTALADA) {
    echo "La aplicación no está configurada";
    exit();
  }

  /* */
  /* Configuración de Codificación */
  /* */

  ini_set('default_charset', 'UTF-8');
  setLocale(LC_ALL, 'es_ES.UTF.8');

  //Inicializa la Aplicacion
  $app = Aplicacion::getSingleton();
  $app->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS));

  require_once RUTA_APP.'/api/session.php';

?>
