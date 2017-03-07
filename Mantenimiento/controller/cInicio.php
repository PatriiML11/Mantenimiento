<?php
/** 
* Controlador de logoff.
* Realiza el cierre de sesión del usuario.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 
require_once 'model/Usuario.php' ;
require_once 'model/Departamento.php' ;
//Acción si se pulsa el botón volver.
if(isset($_POST['volver'])){
    //Cerrar la sesión y destruirla.
    unset($_SESSION['usuario']);
    session_destroy();
    header('Location: index.php');

}else{
	include 'view/layout.php';
}
		
?>