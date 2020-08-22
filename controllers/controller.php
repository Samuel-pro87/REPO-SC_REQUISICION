<?php

class MvcController{
    
    #Llamada a la plantilla
    #--------------------------------------
        public function plantilla(){
            #include() Se utiliza para invocar el template, que tiene el código html que necesitamos
            include "views/template.php";
        }
        #interección del usuario
        #-----------------------
        public function enlacesPaginasController() {
            if(isset($_GET["action"])){
                   $enlacesController = $_GET["action"];
            }
            else{
                $enlacesController = "index";
            }
         
            #echo $enlacesController;
            
            $respuesta = EnlacesPaginas::enlacespaginasModel($enlacesController);
            
            include $respuesta;
            
        }
}
?>