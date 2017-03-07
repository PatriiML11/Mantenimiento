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
//Almacenar en una sesión el departamento a modificar.
$_SESSION['departamentoModif']=$departamento;
?> 

<br/>
<br/>	
<div class="formularios">
	<form  method="post" name="formu1" class="formu1">
	<button name="logoff" id="logoff">Logoff</button>
		<h1>Modificar departamento</h1>
		<br/>
		<div><?php if(!empty($errores['codigo'])){echo $errores['codigo'];} ?></div> 
		<p>CodigoDepartamento: <br/><input type="text" name="codigo" value="<?php print $_SESSION['departamentoModif']->getCodDepartamento(); 
		?>" readonly/>
		
		<br/>
		<div><?php if(!empty($errores['descripcion'])){echo $errores['descripcion'];} ?></div> 
		<p>DescDepartamento: <br/><input type="text" name="bdesc" value="<?php print $_SESSION['departamentoModif']->getDescDepartamento(); ?>" />
		
		<br/>
		<div><?php if(!empty($errores['fecha'])){echo $errores['fecha'];} ?></div> 
		<p>FechaBaja: <br/><input type="date" name="fechabaja" value="<?php print $_SESSION['departamentoModif']->getFechaBaja(); ?>" />
		
		<br/>
		<br/>
		<div class="botones">
			<a href="./index.php?location=modificar"><input type="submit" name="modificar" value="Modificar"/></a>
			<a href="index.php?location=mantenimiento"> <input type="button" name="volver" value="Volver"/></a>
		</div>
	</form>
</div>