<?php

include_once 'repositorioProspectos.php';

class validadorProspecto {

//    private $curp;
//    private $nombre;
//    private $apellidop;
//    private $apellidom;
//    private $direccion;
//    private $email;
//    private $emaile;
//    private $fechain;
//    private $fechab;
//    private $fechaN;
//    private $id_empleado;
//    private $rfc;
//    private $nss;
//    private $nombreC;
//    private $telC;
//    private $status;
//    private $telCasa;
//    private $tipoS;
//    
    private $conexion;
    private $estatus;
    private $mensaje;
    private $br;

    //public function __construct($CURP, $email, $id_empleado, $password1, $password2, $conexion) {
   
    
    public function validarDatos($post, $conexion){
        $this->conexion = $conexion;
        $this->mensaje = "";
        $this->br = "<br/>";
        $this->estatus = 1;

        extract($_POST);
//        if(!$this->variableIniciada($chekbox1) || empty($this->variableIniciada($chekbox1))){
//            $this->mensaje .= "Debes de Aceptar los Términos y Condiciones" . $this->br;
//            $this->estatus=0;
//        }

        if (!$this->variableIniciada($curp)) {
            $this->mensaje .= "Ingrese su CURP por favor." . $this->br;
            $this->estatus=0;
        }        
        if (strlen($curp) != 18) {
            $this->mensaje .= "El CURP debe contentener 18 caracteres [".strlen($curp)."]".$this->br;
            $this->estatus=0;
        }        
        if (repositorioProspectos::curpExiste($curp, $this->conexion)) {
            $this->mensaje .= "CURP ya está en USO, pongase en contacto con el administrador".$this->br;
            $this->estatus=0;
        }
        //validar email
        if (!$this->variableIniciada($emailE)) {
            $this->mensaje .= "Ingresa tú Correo electronico, por favor".$this->br;
            $this->estatus=0;
        } 
        if (filter_var($emailE, FILTER_VALIDATE_EMAIL) == false) {
            $this->mensaje .= "Este correo ($emailE) no es valido, ejemplo usuario@allie.mx".$this->br;
            $this->estatus=0;
        }
        if (repositorioProspectos::emailExiste($this->conexion, $emailE)) {
            $this->mensaje .= "El Correo ya se encuentra en USO".$this->br;
            $this->estatus=0;
        }
        
        return  array(
            "mensaje"=>$this->mensaje,
            "estatus"=>$this->estatus
                );
    }
    
    //INICIAR VARIABLES
    private function variableIniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
}
?>


