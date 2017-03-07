
<?php
/**
* Modelo UsuarioPDO.
* Realiza las operaciones relacionadas con la base de datos.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 
	require_once 'DBPDO.php';
	class UsuarioPDO{   
		/** 
	     * Valida un usuario y su contraseña. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codUsuario Código del usuario.
	     * @return array['string'] Datos del usuario.
	     */
	  	public static function validarUsuario($codUsuario,$password){
	  		$user=[];
	  		$sql="select * from Usuario where CodUsuario=? and Password=?";
	  		$resul=DBPDO::ejecutaConsulta($sql,[$codUsuario, $password]);	
	 
	  		if($resul->rowCount()){ 		
	  			$usuario=$resul->fetchObject();
	  			$user['CodUsuario']=$usuario->CodUsuario;
	  			$user['DescUsuario']=$usuario->DescUsuario;
	  			$user['Password']=$usuario->Password;
	  			$user['Perfil']=$usuario->Perfil;
	  		}
	  		return $user;
	  	}
	}
		
?>
