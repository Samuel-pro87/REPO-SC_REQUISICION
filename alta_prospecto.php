<style> 
            
            header{
                position: relative;
                margin: auto;
                text-align: center;
                padding: 8px;
            }
            nav{
                position: relative;
                margin: auto;
                width: 100%;
                height: auto;
                background: skyblue;
            }
            nav ul{
               position: relative;
               margin: auto;
               width: 50%;
               text-align: center;
            }
            nav ul li{
                display: inline-block;
                width: 24%;
                line-height: 50px;
                list-style: none;
            }
            nav ul li a{
                color: black;
                text-decoration: none;
            }
            action{
                position: relative;
                padding: 20px;
            }
        </style>
<?php
require_once 'includes/header.php';
include_once "conexions/conexion.php";
include_once 'includes/repositorioProspectos.php';
include_once 'conexions/Config.php';
$cadenaConexion = "host=" . NOMBRE_SERVIDOR . " dbname=" . BASE_DATOS . " user=" . USUARIO . " password=" . PASS;
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
if (isset($_GET['id'])) {
    $curp = $_GET['id'];
    $con = new repositorioEmpleado();
    $datos = $con->obtenerEmpleadoCurp(Conexion::obtenerConexion(), $curp);
}
?>
<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="index.php?action=nosotros">Nosotros</a></li>
        <li><a href="index.php?action=servicio">Servicios</a></li>
        <li><a href="index.php?action=contactanos">Pre-Registro</a></li>
    </ul>
</nav>
<!--   CONTENEDOR PRINCIPAL-->
<div class="container-fluid">

    <!--FILA uno-->
    <div class="row">   
        <!--COLUMNA UNO FILA uno-->
        <div class="col-3">

        </div> 
        <!-- FIN COLUMNA UNO FILA DOS-->
        <!--COLUMNA DOS FILA uno-->
        <div class="col-6">
            <div class="Container p-4">
                <h1 class="text-center text-primary"> **- Haz tú Pre-Registro -**</h1>
                <div class = "row">
                    <div class="card card-body">
                        <form action ="includes/registro-prospecto.php" method ="POST">
                            <div class="form-row">
                                <div class ="form-group col-md-6"> 
                                    <input type="text" name ="curp" class ="form-control"
                                           placeholder="CURP" required>
                                </div>
                                <div class ="form-group col-md-6"> 
                                    <input type="text" name ="nombre"  class ="form-control"
                                           placeholder="Nombre(s)" required>
                                </div>
                                <div class ="form-group col-md-6"> 
                                    <input type="text" name ="apellidoP" class ="form-control"
                                           placeholder="Apellido Paterno" required>
                                </div>
                                <div class ="form-group col-md-6"> 
                                    <input type="text" name ="apellidoM" class ="form-control"
                                           placeholder="Apellido Materno" required>
                                </div>
                                <div c <div class ="form-group col-md-6"> 
                                    <input type="text" name ="rfc" class ="form-control"
                                           placeholder="RFC" required>
                                </div> 
                                <div class ="form-group col-md-6"> 
                                    <input type="text" name ="nss" class ="form-control"
                                           placeholder="Número de Seguro Social (NSS)" required>
                                </div>
                               
                                <div class ="form-group col-md-6"> 
                                    <input type="email" class="form-control" name="emailE" placeholder="E-mail" required>
                                </div> 
                                <div class ="form-group col-md-6"> 
                                    <input type="text" name ="telMovil" class ="form-control"
                                           placeholder="Telefono Móvil" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <!--<label for="inputState">Status</label>-->
                                    <select name="escolaridad" class="form-control">
                                        <option>Doctorado</option>
                                        <option>Maestría</option>
                                        <option selected>Universitario</option>
                                        <option>Técnico Superior Universitario</option>
                                        <option>Media Superior</option>
                                        <option>Básico</option>
                                        <option>Primaria</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6"> 
                                    <select name="id_puesto" class="form-control" >
                                        <?php
//                                            $puesto = $datos['id_puesto'];
                                        $registro = pg_query($conexion, "SELECT * FROM rh_puesto");
                                        while ($reg = pg_fetch_array($registro)) {
                                            ?>
                                            <option value=" <?php echo $reg['id_puesto'] ?>">
                                                <?php echo $reg['puesto']; ?>
                                            </option>   
                                        <?php } ?>  
                                    </select>
                                </div>
                            </div>                       
                            <div class="form-row">
                                <div class ="form-group col-md-6"> 
                                    <input type="text" name ="fechaN" class ="form-control"
                                           placeholder="Fecha de Nacimiento" required>
                                </div>
                                <div class="form-group col-md-6"> 
                                    <select name="reclutamiento" class="form-control" >
                                        <?php
                                        $registro = pg_query($conexion, "SELECT * FROM rh_cat_medios_reclutamiento");
                                        while ($reg = pg_fetch_array($registro)) {
                                            ?>
                                            <option value=" <?php echo $reg['id_portal_utilizado'] ?>">
                                                <?php echo $reg['el_portal_utilizado']; ?>
                                            </option>   
                                        <?php } ?>  
                                    </select>
                                </div>
                                 <div class ="form-group col-md-6"> 
                                    <input type="text" name ="fechaEntrevista" class ="form-control"
                                           placeholder="Fecha de entrevista" required>
                                </div>
                                 </div>
<!--                                <div class="row">
                                    <div class ="form-group col-md-2" class="form-control"> 
                                    <input type="checkbox" name ="chekbox[]"
                                           value="1" >
                                </div>
                                    <div class ="form-group col-md-10" class="form-control"> 
                                        <a href="PhpTerminoCondiciones.php"> Términos y Condiciones </a>
                                </div>-->
                               
                             
                                <input type="submit" class ="btn btn-success btn-block"
                                       name="update_" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
        <!-- FIN DE LA COLUMNA DOS FILA uno-->
        <!--COLUMNA TRES FILA uno-->
        <div class="col-3">

        </div> 
        <!-- FIN DE LA COLUMNA TRES FILA uno-->

    </div> <!-- FIN FILA DOS-->
    <!--Footer-->
    <div class="row">   
        <!--<p> Selecciona IDIOMA ====  <a href="#">Ingles</a> ====  <a href="#">Portugues</a></p>-->

        <div style="color:blanchedalmond; background-color: blue; font-size:11px; padding-top:13px; padding-left:40px; float:left;">
            Derechos Reservados Allie Allianzas Estratégicas, S.A.P.I. de C.V.<br/>
            <a href="aviso_de_privacidad.php" style="position:relative; z-index:999;">Aviso de Privacidad</a>
            <!--C:\xampp\htdocs\PhpDeVRH_contatado\aviso_de_privacidad.php-->
        </div>
        <div style="color:#fff; font-size:12px; padding-top: 40px; margin-top: -15px; padding-left:400px; float:left;">
            <a href="index.php">Inicio</a>&nbsp;&nbsp;<a href="index.php?action=nosotros">Nosotros</a>&nbsp;&nbsp;<a href="index.php?action=servicio">Servicio </a> 
            <!--               		<a href="index.php">Inicio</a>&nbsp;&nbsp;<a href="index.php?action=nosotros">Nosotros</a>&nbsp;&nbsp;<a href="administracionycobranza.html">Administración y Cobranza</a> &nbsp;&nbsp;<a href="recuperacion.html">Recuperación de Cartera</a> &nbsp;&nbsp;<a href="ventadebienesadjudicados.html">Venta de Bienes Adjudicados</a> &nbsp;&nbsp;<a href="contacto.html">Contacto </a> -->
        </div>

    </div> <!-- FIN FILA TRES-->

</div><!-- FIN DEL CONTENEDOR PRINCIPAL-->
<?php require_once 'includes/footer.php'; ?>