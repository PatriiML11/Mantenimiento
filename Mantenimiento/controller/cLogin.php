<?php
/**
 * Controlador de la página de Login.
 * Realiza el inicio de sesión.
 *
 * @author Patricia Martínez Lucena
 * Fecha de última modificación: 26/01/2017
 */
require_once 'model/Usuario.php';

//Acción si ya se ha iniciado sesión.
if (isset($_SESSION['usuario'])) {
    header("Location: index.php?location=inicio");
} else {
	//inicializar entrada a falsa.
	$entradaOK=false;
	//inicializar array de almacenamiento de errores.
		$errores=[
			'usuario'=>'',
			'password'=>''
		];
		//inicializar array de almacenamiento de los datos de los campos del formulario.
		$campos=[
			'usuario'=>'',
			'password'=>''
		];
	//Acción si se ha pulsado el botón enviar.
	if(isset($_POST['enviar'])){
		$entradaOK=true;
		//almacenar los datos de los campos en el array.
		$campos=[
			'usuario'=>$_POST['usuario'],
			'password'=>$_POST['password']
		];
		//Acción si se encuentra vacío algún campo.
		if (empty($campos['usuario']) || empty($campos['password'])) { 	
			$entradaOK=false;
			$errores['usuario'] = "Campo/s vacío/s"; 
		}else { 
			//Almacenar en una variable el usuario recibido.
			$usuario=Usuario::validarUsuario($_POST['usuario'],hash(sha256,($_POST['password'])));
			//Acción si no se encuentra el usuario.
			if($usuario==null){
				$entradaOK=false;
				//Almacenar el error en el array.
				$errores['usuario'] = "Debes introducir un nombre de usuario y una contraseña válidos"; 
			}
		}
	}
	include 'view/layout.php';
	//Acción si no se ha encontrado ningún error.
	if($entradaOK){
		//Iniciar la sesión.
		session_start();
		$_SESSION['usuario']=$usuario;
		header('Location: index.php?location=mantenimiento');
	}
}
?>
