<?php 
error_reporting(E_ALL);
require_once 'app/controller/controller.php';

$controller = $_GET['controller'];

if (isset($controller)) {

    $metodo = new controller;

    switch ($_GET['controller']) {
        case $controller:
                $metodo->$controller();
            break;
        default:
        $metodo->inicio();
        break;
    }
}else {
    header('Location:?controller=Inicio');
}