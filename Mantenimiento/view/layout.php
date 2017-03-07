<?php
/**
* Layout.
* Estructura y estilo general de todas las páginas.
* 
* @author Pablo Mora Martín
* Editado por: Patricia Martínez Lucena
* Fecha de última modificación: 22/02/2017 
*/ 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Página de prueba</title>
        <style>
            body{
                margin:5% 10% 5% 10%;
                position: relative;
                background: url('./images/upfeathers.png') repeat;
            }
            a{
                text-decoration: none;
                color:#807c51;
            }
            .error{
                border:solid 2px #f14c4c;
            }
            .textoerror{
                font-weight:bold;
                color:red;
            }
            .formularios{
                text-align:center;
                position:relative;
                width:70%;
                height:100%;
                top: 50%;
                left: 50%;
                transform: translateX(-50%);
            }
            .formu1{
                position:relative;
                border:solid 3px purple;
                padding:20px;
                width:400px;
                background-color:#d4efff;
                border-radius: 10px;
                box-shadow: 3px 5px 5px;
                top: 50%;
                left: 50%;
                transform: translateX(-50%);
            }
            button{
                width:80px;
                height: 30px;
                border: solid 2px purple;
                background-color: #f8fbc5;              
                border-radius: 8px;
                font-weight: bold;
            }
            h1{
                font-family: sans-serif;
                color:#3f2e94;
            }
            table{
                position: relative;
                background-color: #94ded0;
                box-shadow: 3px 5px 5px;
                top: 50%;
                left: 50%;
                border-radius: 10px;
                transform: translateX(-50%);
            }
            tr{
                background-color: #fff7e1;
            }
            #tit{
                background-color: #94ded0;
            }
            td{
                padding:10px 15px 10px 15px;
            }
            .datos{
                position:relative;
                border:dotted 1px silver;
                background-color: #e4fffe;
                width:300px;
                border-radius: 10px;
                top: 50%;
                left: 50%;
                transform: translateX(-50%);
            }
            #logoff{
                position: absolute;
                right: 0;
            }
            .btntab:hover{
                transform:scale(1.3);
            }
            .doc{
                font-weight: bold;
                background-color:white;
            }
        </style>
    </head>
    <body>  
        <?php
            $layout = "vMantenimiento.php";
            if (isset($_GET['location']) && isset($vistas[$_GET['location']])) {
                $layout = $vistas[$_GET['location']];
            }
            include $layout;
        ?>


    </body>
</html>
