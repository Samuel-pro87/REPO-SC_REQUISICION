<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Plantilla</title>
        
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
    </head>
    <body>
        <header>
               <h1>Logotipos</h1>
        </header>
        <?php 
      include "views/modules/navegacion.php";
      ?>
        <section>
             <?php 
            $mvc = new MvcController();
            $mvc -> enlacesPaginasController();
              ?>
        </section>
    </body>
</html>