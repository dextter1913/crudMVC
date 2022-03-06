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
            header('Location:?controller=getData');
        }
    }

    /**
     * OBTENIENDO DATOS
     */
    public function getData()
    {
        $query = $this->query->getAllData();
        $getData = $this->crud->Read($query);
        $rows = mysqli_fetch_assoc($getData);
        superior();
        require_once 'app/views/modules/table.phtml';
        inferior();
    }

    /**
     * ELIMINANDO DATOS
     */
    public  function deleteData()
    {
        $id = '';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = $this->query->deleteData($id);
            $this->crud->Delete($query);
            header('Location:?controller=getData');
        } else {
            header('Location:?controller=getData');
        }
    }

    /**
     * MODIFICANDO DATOS
     */
    public function UpdateData()
    {
        $id = $_GET['id'];

        $query = $this->query->getData($id);
        $data = $this->crud->Read($query);
        $row = mysqli_fetch_assoc($data);
        superior();
        require_once 'app/views/modules/formUpdate.phtml';
        inferior();
    }

    public function procesoUpdate()
    {
        $datos = [];
        if (isset($_POST['id'])) {
            $datos = [
                'id'       => $_POST['id'],
                'nombre'   => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'telefono' => $_POST['telefono']
            ];

            
            $query = $this->query->UpdateData($datos);
            echo '<pre>';
            print_r($query);
            echo '</pre>';
            $this->crud->Update($query);
            header('Location:?controller=getData');
        }else {
            header('Location:?controller=getData');
        }
    }
}
