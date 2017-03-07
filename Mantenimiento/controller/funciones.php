		
<?php 
	
	/**
	* Librería de validación de funciones
	* Muestra el código del Controlador de Mantenimiento.
	* 
	* @author Patricia Martínez Lucena 
	* Fecha de última modificación: 14/12/16
	*/ 
	
	function validartexto($texto){
		$patrontexto="/^[a-zA-Z]+$/";
		$error="";
		if(empty(trim($texto))){ //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		}else{
			if(!preg_match($patrontexto, $texto)){
				$error="Introduce solo letras";
			}
		}
		return $error;
	}
	/**
	* Valida texto con longitud.
	* 
	* @param string $texto Texto a comprobar.
	* @param string $longitud Longitud del texto.
	* @return string $error.
	*/ 
	function validartextolongitud($texto, $longitud){
		$patrontexto="/^[a-zA-Z]{".$longitud."}+$/";
		$error="";
		if(empty(trim($texto))){ //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else {	
			if(!preg_match($patrontexto, $texto)){
				$error="3 LETRAS únicamente";
			}
		}
		return $error;
	}
	/**
	* Valida texto con números.
	* 
	* @param string $textonumero Texto con números a comprobar.
	* @return string $error.
	*/ 
	function validartextonumero($textonumero){
		$patrontextonumero="/^[a-zA-Z0-9]+$/";	
		$error="";
		if (empty(trim($textonumero))) { //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else 	if(!preg_match($patrontextonumero, $textonumero)){
			$error="Formato incorrecto";
		}
		return $error;
	}
	/**
	* Valida número entero.
	* 
	* @param string $entero Número entero a comprobar.
	* @return string $error.
	*/ 
	function validarentero($entero){
		$patronentero="/^[0-9]+$/";	
		$error="";
		if (empty(trim($entero))) { //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else 	if(!preg_match($patronentero, $entero)){
			$error="Formato incorrecto";
			
		}
		return $error;
	}
	/**
	* Valida contraseña. Admite caracteres: _!@#$%^&*().
	* 
	* @param string $password Contraseña a comprobar.
	* @return string $error.
	*/ 
	function validarpassword($password){
		$patronpassword="/^[a-zA-Z][a-zA-Z0-9_!@#$%^&*().]+$/";	
		$error="";
		if (empty(trim($password))) { //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else 	if(!preg_match($patronpassword, $password)){
			$error="Formato incorrecto";
		}
		return $error;
	}
	/**
	* Valida fecha. Formato: dd-mm-aaaa.
	* 
	* @param string $fecha Fecha a comprobar.
	* @return string $error.
	*/ 	
	function validarfecha($fecha){
		$patronfecha="/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/";
		$error="";
		if (empty(trim($fecha))) { //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else 	if(!preg_match($patronfecha, $fecha)){
			$error="Formato incorrecto";
		}
		return $error;
	}
	/**
	* Valida hora. Formato: hh:mm.
	* 
	* @param string $hora Hora a comprobar.
	* @return string $error.
	*/ 
	function validarhora($hora){
		$patronhora="/^[0-2][0-3]:[0-5][0-9]$/";	
		$error="";
		if (empty(trim($hora))) { //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else 	if(!preg_match($patronhora, $hora)){
			$error="Formato incorrecto";
		}
		return $error;
	}	
	/**
	* Valida email.
	* 
	* @param string $email Email a comprobar.
	* @return string $error.
	*/ 
	function validaremail($email){
		$patronemail="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";	
		$error="";
		if (empty(trim($email))) { //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else 	if(!preg_match($patronemail, $email)){
			$error="Formato de Email incorrecto";
		}
		return $error;
	}					
	/**
	* Valida número decimal.
	* 
	* @param string $decimal Número decimal a comprobar.
	* @return string $error.
	*/ 
	function validardecimal($decimal){
		$patrondecimal="/^([0-9]+)([.|,])([0-9]+)$/";	
		$error = ""; 
		if (empty(trim($decimal))) { //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else 	if(!preg_match($patrondecimal, $decimal)){
			$error="Numero decimal incorrecto";
		}
		return $error;
	}			
	/**
	* Valida DNI.
	* 
	* @param string $email DNI a comprobar.
	* @return string $error.
	*/ 	
	function validardni($dni) { 
		$error = ""; 
		$caracteresDNI = "TRWAGMYFPDXBNJZSQVHLCKE"; //Cadena de caracteres que sirve para comprobar si se ha introducido bien la letra del DNI 
		$patron = "/([0-9]{8})([a-zA-Z]{1})/"; //Patrón del DNI en España. 8 números + una letra. 
		if (empty(trim($dni))) { //Se genera error si el campo está vacío 
			$error = "Campo vacío"; 
		} else if (preg_match($patron, $dni)) { //Si el DNI coincide con el patrón, se comprueba que se haya introducido bien la letra 
			$numerosDNI = $dni . substr($dni, 0, -1); 
			$valor = ($numerosDNI % 23); 
			$letraIntroducida = $dni[8]; 
			$letraDNI = substr($caracteresDNI, $valor, 1); 
			if ($letraDNI !== $letraIntroducida) {//Se genera error si no se ha introducido bien la letra 
				$error = "Letra mal introducida"; 
			} 
		} else {//Se genera error si el dni no coincide con el patrón 
			$error = "Formato DNI incorrecto"; 
		} 
		return $error; 
	} 
				
			
?>
