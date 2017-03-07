<?php
/** 
* Controlador del mantenimiento de los departamentos.
* Realiza la búsqueda de uno o varios departamentos y redirige a las demás páginas.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 
require_once 'model/Departamento.php';
//Almacenar en una variable la lista de los departamentos.
$tabla=Departamento::listarDepartamentos("");
//Almacenar en una sesión la lista, para volver a utilizarla.
$_SESSION['lista']=$tabla;
//inicializar entrada a falsa.
$entradaOK=false;
//Acción si no se ha iniciado sesión.
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?location=inicio");
} else {
	$error='';
	$campo='';
	//Acción si se ha pulsado el botón buscar.
	if(isset($_POST['buscar'])){
	//Necesita mi librería de funciones.
	include 'funciones.php';
		//inicializar la entrada a correcta
		$entradaOK=true;
		//obtener valores de los campos
		$campo=$_POST['bdesc'];
			//comprueba si es válido el texto escrito en el campo de descripción.
			if(validartexto($campo)){
				$entradaOK=false;
				$error=validartexto($campo);
		
			}else{
				//Almacena en una variable la lista de los departamentos.
				$departamento=Departamento::listarDepartamentos($campo);
				//Acción si no se encuentra el departamento.
				if($departamento==null){
					$entradaOK=false;
					$error = "No se ha encontrado el departamento.";
				}
			}

		}else{
			
		}
	//Acción si se ha pulsado el botón logoff.
	if(isset($_POST['logoff'])){
		header('Location: index.php?location=inicio');
	}
	//Acción si se ha pulsado el botón insertar.
    if(isset($_POST['insertar'])){
        header('Location: index.php?location=insertar');
    }	
	
	
	//Acción si no se ha encontrado ningún error.
	if($entradaOK){
		$_SESSION['departamento']=$departamento;
		$_SESSION['buscar']=$_POST['bdesc'];
		$_SESSION['lista']=$tabla;
		header('Location: index.php?location=buscar');
	}
require_once 'view/layout.php';
}
?>