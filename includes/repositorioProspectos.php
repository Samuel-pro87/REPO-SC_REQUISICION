 <?php

class repositorioProspectos {

    public static function insertarProspectos($conexion, $prospecto) {
        $prosInsertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO rh_prospecto_contactado (curp, apellido_paterno, apellido_materno, nombres,"
                        . " email, imss, rfc, fecha_nacimiento, telefono, escolaridad, puesto_solicitado, fecha_entrevista, fuente_reclutamiento)"
                        . "values (?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $stmt = $conexion->prepare($sql);
                extract($_POST);

        $stmt->bindValue(1,$_POST['curp'], PDO::PARAM_STR);
        $stmt->bindValue(2,$_POST['apellidoP'], PDO::PARAM_STR);
        $stmt->bindValue(3,$_POST['apellidoM'], PDO::PARAM_STR);
        $stmt->bindValue(4,$_POST['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(5,$_POST['emailE'], PDO::PARAM_STR);
        $stmt->bindValue(6,$_POST['nss'], PDO::PARAM_STR);
        $stmt->bindValue(7,$_POST['rfc'], PDO::PARAM_STR);
        $stmt->bindValue(8,$_POST['fechaN'], PDO::PARAM_STR);
        $stmt->bindValue(9,$_POST['telMovil'], PDO::PARAM_STR);
        $stmt->bindValue(10,$_POST['escolaridad'], PDO::PARAM_STR);
        $stmt->bindValue(11,$_POST['id_puesto'], PDO::PARAM_STR);
        $stmt->bindValue(12,$_POST['fechaEntrevista'], PDO::PARAM_STR);
        $stmt->bindValue(13,$_POST['reclutamiento'], PDO::PARAM_STR);
        
        $prosInsertado = $stmt->execute();

                $prosInsertado = true; //true
            } catch (PDOException $ex) {
                print "ERROR " . $ex->getMessage();
            }
        }
        return $prosInsertado; //true or false
    }

    public static function obtenerProspectoCurp($conexion, $curp) {
        $usuario = null;
        if (isset($conexion)) {
            try {
                include_once 'empleado.php';
                $sql = "SELECT * FROM rh_datos_personales WHERE curp = :curp";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':curp', $curp, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new empleado($resultado['nombre'], $resultado['apellido_paterno'], $resultado['apellido_materno'], $resultado['curp'],
                            $resultado['rfc'], $resultado['direccion_empleado'], $resultado['tel_casa'], $resultado['tel_movil'], $resultado['tel_contacto'],
                            $resultado['email_personal'], $resultado['id_puesto'], $resultado['fecha_nacimiento'], $resultado['fecha_ingreso'], $resultado['fecha_baja'],
                            $resultado['nss'], $resultado['status'], $resultado['email_empresa'], $resultado['nombre_contacto'], $resultado['tipo_sangre']);
                    
//                    echo "CURP : " . $resultado['curp'];  //imprime lo que obtiene de la base de datos
//                    echo "<br/>";
//                    echo "  E-mail : " . $resultado['nombre'];
//                    echo "<br/>";
//                    echo "     Password : " . $resultado['apellido_paterno'];
//                    echo "<br/>";
//                    echo "   Empleado : " . $resultado['Status'];
//                       echo " <br/>===== <br/>";
                }
                else{
                    echo "<br/> usuario no existe";
                    header("Location: nuevo-empleado.php");
                    
                    die();
                }
            } catch (PDOException $ex) {
                print "ERROR " . $ex->getMessage();
                die();
            }
        }
        //return $usuario;
        return $resultado;
    }

    public static function curpExiste($curp, $conexion) {

        $curpExiste = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM rh_prospecto_contactado WHERE curp = ?";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(1, $curp, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    $curpExiste = true;
                } else {
                    $curpExiste = false;
                }
            } catch (PDOException $ex) {
                print "ERROR " . $ex->getMessage();
            }
        }
        return $curpExiste;
    }
    public static function emailExiste($conexion, $email) {
        $emailExiste = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM rh_prospecto_contactado WHERE email = :email";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $emailExiste = true;
                } else {
                    $emailExiste = false;
                }
            } catch (PDOException $ex) {
                print "ERROR " . $ex->getMessage();
            }
        }
        return $emailExiste;
    }
}
?>
