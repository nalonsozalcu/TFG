<?php require_once '../config.php';

    /**
     * CLase cuya implementación sigue el patrón de diseño Singleton.
     * Así, solo tendremos una instancia de Aplicacion que se encargará de gestionar la conexión de la BD.
     * Creación perezosa: no crear una instancia hasta el último momento posible
     */


    class Aplicacion {

        private static $instancia;

        private $datosBD; // Array con datos necesarios para crear conexión con la BD

        private $conn; // conexión con la BD

        public static function getSingleton(){
            if (! self::$instancia instanceof self) {
                self::$instancia = new self;
            }
            return self::$instancia;
        }

        protected function __construct(){
            // The constructor __construct() is declared  as protected to
            // prevent creating a new instance outside of the class via the new operator.
        }

        private function __clone(){
            // The magic method __clone() is declared as private to prevent cloning of an instance of the
            // class via the clone operator.
        }

        public function __wakeup(){
            // The magic method __wakeup() is declared as private to prevent unserializing of an instance
            // of the class via the global function unserialize().
        }

        /**
        * Función que permite inicializar la instancia de la aplicación.
        */
        public function init($datosbd){
            if($this->datosBD == null){
                $this->datosBD = $datosbd;
                session_start();
            }
        }

        /**
        * Función que se encarga de crear una conexión con el servidor MySQL y devolverla, o si ya existe una devolver la que ya exista.
        */

        public static function getConexionBD(){
            global $connec;
            if(! $connec){
                $connec = new \mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
                if ( $connec->connect_errno ) {
                    echo "¡Error de conexión a la BD! Error: " . $connec->connect_errno . utf8_encode($connec->connect_error);
                    exit();
                }
                if ( ! $connec->set_charset("utf8mb4")) {
                    echo "Error al configurar la codificación de la BD: (" . $connec->errno . ") " . utf8_encode($connec->error);
                    exit();
                }
            }
            return $connec;
        }


        /**
         * Cierre de la aplicación.
        */
        
        public function shutdown()
        {
            //$this->compruebaInstanciaInicializada();
            if ($this->conn !== null && ! $this->conn->connect_errno) {
                $this->conn->close();
            }
        }
    }


?>
