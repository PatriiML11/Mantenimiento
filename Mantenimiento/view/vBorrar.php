<?php 
/**
* Vista Borrar.
* Interface de borrado de departamento.
* 
* @author Patricia Martínez Lucena
* Fecha de última modificación: 22/02/2017 
*/ 
require_once 'model/Departamento.php';
//recuperar Codigo seleccionado en la página anterior.
$id=$_GET['id'];
//Almacenar en una variable el departamento recibido.
$departamento=Departamento::buscarDepartamentoPorCodigo($id);
//Almacenar en variables los distintos valores recibidos. 
$id=$departamento->getCodDepartamento();
$desc=$departamento->getDescDepartamento();
$fecha=$departamento->getFechaBaja();
//Almacenar en una sesión el departamento a borrar.
$_SESSION['departamentoBorr']=$departamento;
?> 
<div id="borrar">
	<div class="formularios">
		<form  method="post" name="formu1" class="formu1">
			<button name="logoff" id="logoff"><a href="logoff.php">Logoff</a></button>
			<h1>¿ESTÁS SEGURO DE QUE QUIERES BORRAR EL DEPARTAMENTO?</h1>
			<br/>
			<p>CodigoDepartamento: <br/><input type="text" name="codigo" value="<?php print $_SESSION['departamentoBorr']->getCodDepartamento(); 
			?>" readonly/>
			<br/>
			<p>DescDepartamento: <br/><input type="text" name="bdesc" value="<?php print $_SESSION['departamentoBorr']->getDescDepartamento(); ?>"  readonly/>
			
			<br/>
			<p>FechaBaja: <br/><input type="date" name="fechabaja" value="<?php print $_SESSION['departamentoBorr']->getFechaBaja(); ?>"  readonly/>
			<br/>
			<br/>
			<div class="botones">
				<a href="./index.php?location=borrar"><input type="submit" name="borrar" value="Borrar"/></a>
				<a href="index.php?location=mantenimiento"> <input type="button" name="volver" value="Volver"/></a>
			</div>
		</form>
	</div>
</div>