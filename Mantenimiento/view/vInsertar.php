<?php 
/**
* Vista Borrar.
* Interface de inserción de departamento.
* 
* @author Patricia Martínez Lucena
* Fecha de última modificación: 22/02/2017 
*/
 require_once 'model/Departamento.php';
?> 
<br/>
<br/>	
<div class="formularios">
	<form action="./index.php?location=insertar" method="post" name="formu1" class="formu1">
	<button name="logoff" id="logoff">Logoff</button>
		<h1>Insertar departamento</h1>
		<br/>
		<div><?php if(!empty($errores['codigo'])){echo $errores['codigo'];} ?></div> 
		<p>CodigoDepartamento: <br/><input type="text" name="codigo"  />
		<br/><div><?php if(!empty($errores['descripcion'])){echo $errores['descripcion'];} ?></div> 
		<p>DescDepartamento: <br/><input type="text" name="bdesc"  />
		<br/>
		<div><?php if(!empty($errores['fecha'])){echo $errores['fecha'];} ?></div> 
		<p>FechaBaja: <br/><input type="date" name="fechabaja"  />
		<br/>
		<br/>
		<div class="botones">
			<input type="submit" name="insertar" value="Insertar"/>
			<a href="./index.php?location=mantenimiento"> <input type="button" name="volver" value="Volver"/></a>
		</div>
		<?php print $_SESSION['insertado']; ?>
</form>
</div>