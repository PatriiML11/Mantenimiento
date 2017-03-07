<?php
/**
* Modelo DBPDO.
* Conexión a la Base de datos.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 
	class DBPDO{   
		/** 
	     * Ejecuta cualquier consulta sql. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $sql Descripción del departamento.
	     * @param string $parametros Parámetros recibidos, deben ser mínimo 1 y entre [].
	     * @return string ResultSet recibido de la consulta.
	     */ 
	  	public static function ejecutaConsulta($sql,$parametros) {
		   	$host='192.168.20.18';
		   	$db='DAW209_pmldbdepartamento';
		    $user = 'DAW209'; 
		    $password = 'paso'; 
		         
		    try{
		    	$conexion = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password); 
		 
		    	$resultado = $conexion->prepare($sql); 
		    	$resultado->execute($parametros);
		    }catch(PDOException $e){
		    	$resultado=null;
		    	die("Error: " . $e->getMessage()); 
		    }
			return $resultado; 
		} 
		
	}
		
?>
	