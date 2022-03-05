<?php 
    class query
    {
        public function getAllData()
        {
            return "SELECT * FROM clientes";
        }

        public function insertData(String $nombre = '', String $apellido = '', String $telefono = '')
        {
            return "INSERT INTO clientes(nombre, apellido, telefono)
                    VALUES('$nombre','$apellido', '$telefono')";
        }
    }
?>