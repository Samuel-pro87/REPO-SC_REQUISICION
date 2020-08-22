<?php

session_start();

class Conexion {

    private static $conexion = null;
    private static $n;

    public static function abrirConexion() {
        if (!isset(self::$conexion)) {
            try {
                include_once 'Config.php';
                self::$conexion = new PDO('pgsql:host=' . NOMBRE_SERVIDOR . ';dbname=' . BASE_DATOS, USUARIO, PASS);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //self::$conexion->exec('SET CHARACTER SET utf8'); esta linea funciuona pero en MySql
                self::$conexion->exec("SET NAMES 'UTF8'");
                self::$n = array();
            } catch (PDOException $ex) {
                print "Error " . $ex->getMessage() . "<br>";
            }
        }
    }

    public static function cerrarConexion() {
        if (isset(self::$conexion)) {
            self::$conexion = null;
        }
    }

    public static function obtenerConexion() {
        if (isset(self::$conexion)) {
            //echo "okkk";
            return self::$conexion;
        } else {
            echo "conexion no establecida";
        }
    }
}

Conexion::abrirConexion();
?>
