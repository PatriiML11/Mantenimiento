<?php
/**
* Vista Login.
* Interface de inicio de sesión.
* 
* @author Patricia Martínez Lucena
* Fecha de última modificación: 22/02/2017 
*/ 
require_once 'model/Usuario.php';
?>
<div id='login'> 
	<form action='index.php?location=login' method='post'> 
		<fieldset > 
			<legend>USUARIO</legend> 
			 <div><span><?php if(!empty($errores['usuario'])){echo $errores['usuario'];} ?></span></div> 
			<div class='campo'> 
				<label for='usuario' >Usuario:</label><br/> 
				<input type='text' name='usuario' id='usuario' maxlength="50" /><br/> 
			</div> 
			<div class='campo'> 
				<label for='password' >Contraseña:</label><br/> 
				<input type='password' name='password' id='password' maxlength="50" /><br/> 
			</div> 
			<div class='campo'> 
				<input type='submit' name='enviar' value='Enviar' /> 
			</div> 
		</fieldset> 
	</form> 
</div> 
