<?php
extract($_POST);
include_once '../conexions/conexion.php';
include_once 'prospecto.php';
include_once 'repositorioProspectos.php';
include_once 'ValidadorProspecto.php';

conexion::abrirConexion();
//echo "<pre>";print_r($_POST);
//die();
$obj = new validadorProspecto();
$validador = $obj->validarDatos($_POST, Conexion::obtenerConexion());

if ($validador["estatus"] == 1) {

    $prospecto = new empleado($_POST['nombre'], $_POST['apellidoP'],$_POST['apellidoM'],$_POST['curp'], $_POST['rfc'],
            $_POST['telMovil'], $_POST['id_puesto'], $_POST['escolaridad'], $_POST['reclutamiento'],
            $_POST['fechaN'], $_POST['nss'], $_POST['emailE'],$_POST['fechaEntrevista']);

    $insertar_prospecto = repositorioProspectos::insertarProspectos(Conexion::obtenerConexion(), $prospecto);
    if ($insertar_prospecto) {
        $insertar_prospecto = null;
        header("Location: ../alta_prospecto.php");
    } else {
        echo "no insertado";
    }
} else {
            echo $validador["mensaje"];
}
//secho json_encode($error);
Conexion::cerrarConexion();
?>

