<?php

function superior()
{
    require_once('app/views/assets/header.html');
}
function inferior()
{
    require_once('app/views/assets/footer.html');
}

require_once 'app/models/autoload.php';

class controller
{
    private $crud;
    private $query;
    public function __construct()
    {
        $this->crud  = new crud();
        $this->query = new query();
    }
    public function inicio()
    {
        $variable = 'cualquier cosa';
        superior();
        require_once 'app/views/modules/Inicio.phtml';
        inferior();
    }

    /**
     * INSERTANDO DATOS DESDE EL FORMULARIO DE LA VISTA A LA BASE DE DATOS
     */
    public function insertar()
    {
        $nombre = '';
        $apellido = '';
        $telefono = '';
        if (isset($_POST)) {
            $nombre   = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $query = $this->query->insertData($nombre, $apellido, $telefono);
            $this->crud->Create($query);
            superior();
            require_once 'app/views/mensajes/mensajeinsert.html';
            inferior();
        }
    }

    public function getData()
    {
        $query = $this->query->getAllData();
        $getData = $this->crud->Read($query);

        $rows = mysqli_fetch_assoc($getData);
        superior();
        require_once 'app/views/modules/table.phtml';
        inferior();
    }
}
