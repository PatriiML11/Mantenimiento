<?php 
/** 
* Controlador de borrar departamento.
* Realiza el borrado del departamento seleccionado.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 
require_once 'model/Departamento.php';
include 'view/layout.php';
//Acción si se ha pulsado el botón de borrar.
if(isset($_POST['borrar'])){
    //Almacenar en una variable el resultado de borrar el departamento.
    $resul=Departamento::borrarDepartamento($_SESSION['departamentoBorr']->getCodDepartamento());
    print $id;
    //Acción si se ha borrado.
    if ($resul) { 
        echo '<p>Departamento eliminado con exito</p>'; 
        echo '<p><a href="index.php?location=mantenimiento">Inicio</a>';
        header('Refresh: 2;url=index.php?location=mantenimiento'); 
    }else{ 
        echo 'No se ha podido eliminar el departamento'; 
        echo '<p><a href="index.php?location=mantenimiento"">Inicio</a>';
        header('Refresh: 2;url=index.php?location=mantenimiento'); 
    } 
}
?> 
