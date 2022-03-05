<?php
require_once('conexion.php');

class crud
{
    private $conexion;
    
    public function __construct()
    {
        $this->conexion = new conexion();
    }

    public function Create(String $query = '')
    {
        mysqli_query($this->conexion->EstablecerConexion(),  $query);
    }

    public function Read(String $query = '')
    {
        $data = mysqli_query($this->conexion->EstablecerConexion(), $query);
        return $data;
    }

    public function Update(String $query = '')
    {
        mysqli_query($this->conexion->EstablecerConexion(),  $query);
    }

    public function Delete(String $query = '')
    {
        mysqli_query($this->conexion->EstablecerConexion(),  $query);
    }
}
