<?php
/**
* Vista Index.
* Interface de Index.
* 
* @author Patricia Martínez Lucena
* Fecha de última modificación: 22/02/2017 
*/
	require_once 'model/Usuario.php';	
	require_once 'model/Departamento.php';	
	require_once 'config/config.php';
	//Iniciar la sesión.
	session_start();	
	// Fichero con la configuración de la navegacion de la página
	$controlador = 'controller/cInicio.php';
	//Acción si ya se ha iniciado sesión.
	if (isset($_SESSION['usuario'])) {
		//Obtener la ruta.
	    if (isset($_GET['location']) && isset($controladores[$_GET['location']])) {
	        $controlador = $controladores[$_GET['location']];
	    }
	} else {
	    $_GET['location'] = 'login';
	    $controlador = $controladores[$_GET['location']];
	}
include $controlador;	
?>	
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
	<br/><br/>
		<div class=""><a href="codigoIndex.php">Codigo Index</a></div>
		<div class=""><a href="model/codigoUsuario.php">Codigo Usuario</a></div>
		<div class=""><a href="model/codigoUsuarioPDO.php">Codigo UsuarioPDO</a></div>
		<div class=""><a href="model/codigoDBPDO.php">Codigo DBPDO</a></div>
		<div class=""><a href="model/codigoDepartamento.php">Codigo Departamento</a></div>
		<div class=""><a href="model/codigoDepartamentoPDO.php">Codigo DepartamentoPDO</a></div>
		<div class=""><a href="controller/codigoCInicio.php">Codigo C.Inicio</a></div>
		<div class=""><a href="controller/codigoCLogin.php">Codigo C.Login</a></div>
		<div class=""><a href="controller/codigoCMantenimiento.php">Codigo C.Mantenimiento</a></div>
		<div class=""><a href="view/codigoVInicio.php">Codigo V.Inicio</a></div>
		<div class=""><a href="view/codigoVLogin.php">Codigo V.Login</a></div>
		<div class=""><a href="view/codigoVMantenimiento.php">Codigo V.Mantenimiento</a></div>
		<div class=""><a href="config/codigoConfig.php">Codigo configuracion</a></div>
		<div class=""><a href="doc/index.html"><img src="images/doc.png" alt="doc" width="50"></a></div>
	</body>
</html>