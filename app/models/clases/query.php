<?php 
    class query
    {
        public function getAllData()
        {
            return "SELECT * FROM clientes";
        }

        public function getData(String $id = '')
        {
            return "SELECT * FROM clientes 
                    WHERE id='$id'";
        }

        public function insertData(String $nombre = '', String $apellido = '', String $telefono = '')
        {
            return "INSERT INTO clientes(nombre, apellido, telefono)
                    VALUES('$nombre','$apellido', '$telefono')";
        }

        public function DeleteData(String $id = '')
        {
            return "DELETE FROM clientes
                    WHERE id = '$id'";
        }

        public function UpdateData(Array $Datos = [])
        {
            return "UPDATE clientes 
                    SET nombre = '{$Datos['nombre']}', apellido = '{$Datos['apellido']}', telefono = '{$Datos['telefono']}'
                    WHERE id = {$Datos['id']}";
        }
    }
