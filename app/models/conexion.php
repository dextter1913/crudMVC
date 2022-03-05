<?php 
    class conexion
    {
        private $host;
        private $user;
        private $pass;
        private $db;

        public function __construct()
        {
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '';
            $this->db   = 'mvc';
        }

        public function EstablecerConexion()
        {
            $host = $this->host;
            $user = $this->user;
            $pass = $this->pass;
            $db   = $this->db;
            $conexion = new mysqli($host, $user, $pass, $db);
            
            error_reporting(0);

            if ($conexion->connect_errno > 0) {
                return 'Lo sentimos no pudismo establecer conexion';
            }else {
                return $conexion;
            }
        }
    }
?>