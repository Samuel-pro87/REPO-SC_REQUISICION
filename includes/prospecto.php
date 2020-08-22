<?php

class empleado {

    private $nombre;
    private $apellidop;
    private $apellidom;
    private $curp;
    private $rfc;
    private $nss;
    private $reclutamiento;
    private $fechaN;
    private $emaile;
    private $telC;
    private $escolaridad;
    private $id_puesto;
    private $fechaEntrevista;
    private $terminos;

    public function __construct($nombre, $apellidoP, $apellidoM, $curp, $rfc, $nss, $reclutamiento,
            $fechaN, $emailE, $telMovil, $escolaridad, $id_puesto, $fechaEntrevista, $terminos
    ) { //El orden de los campos debe ser el mismo al de la tabla origen
        $this->nombre = $nombre;
        $this->apellidop = $apellidoP;
        $this->apellidom = $apellidoM;
        $this->curp = $curp;
        $this->rfc = $rfc;
        $this->nss = $nss;
        $this->reclutamiento = $reclutamiento;
        $this->fechaN = $fechaN;
        $this->emaile = $emailE;
        $this->telC = $telMovil;
        $this->escolaridad = $escolaridad;
         $this->id_puesto = $id_puesto;
        $this->fechaEntrevista = $fechaEntrevista;
        $this->terminos = $terminos;
        
       // www.bancoazteca.com.mx
    }

    public function obtenerCurp() {
        return $this->curp;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerApellidoP() {
        return $this->apellidop;
    }

    public function obtenerApellidoM() {
        return $this->apellidom;
    }

    public function obtenerDireccion() {
        return $this->direccion;
    }

    public function obtenerEmailempleado() {
        return $this->email_personal;
    }

    public function obtenerEmailempresa() {
        return $this->email;
    }

    public function obtenerFechaNac() {
        return $this->fechaN;
    }

    public function obtenerfechaIn() {
        return $this->fechain;
    }

    public function obtenerfechaBa() {
        return $this->fechab;
    }

    public function obtenerIdPuesto() {
        return $this->id_puesto;
    }

    public function obtenerrfc() {
        return $this->rfc;
    }

    public function obtenerNSS() {
        return $this->nss;
    }

    public function obtenerNombreC() {
        return $this->nombreC;
    }

    public function obtenerTelefonoCasa() {
        return $this->telCasa;
    }

    public function obtenerTelenofoConta() {
        return $this->telC;
    }

    public function obtenerStatus() {
        return $this->status;
    }

    public function obtenerTipoSang() {
        return $this->tipoS;
    }

}

?>