<?php
/**
* Modelo DepartamentoPDO.
* Realiza las operaciones relacionadas con la base de datos.
* 
* @author Patricia Martínez Lucena
* Fecha de última modificación: 22/02/2017
*/
require_once 'DBPDO.php';
class DepartamentoPDO{   
	/** 
     * Busca un departamento por su descripción. 
     * 
     * @author Patricia Martínez Lucena 
     * 
     * @param string $descDepartamento Descripción del departamento.
     * @return array Datos del departamento.
     */ 
  	public static function validarDepartamento($descDepartamento){
  		$arrayDep=[];
  		$sql="select * from Departamento where DescDepartamento like CONCAT('%', ?, '%')";
  		$resul=DBPDO::ejecutaConsulta($sql,[$descDepartamento]);	
  		if($resul->rowCount()){ 		
  			$departamento=$resul->fetchObject();
  			$arrayDep['CodDepartamento']=$departamento->CodDepartamento;
  			$arrayDep['DescDepartamento']=$departamento->DescDepartamento;
  			$arrayDep['FechaBaja']=$departamento->FechaBaja;
  		}
  		return $arrayDep;
  	}
  	/** 
     * Busca un departamento por su código. 
     * 
     * @author Patricia Martínez Lucena 
     * 
     * @param string $codDepartamento Código del departamento.
     * @return array Datos del departamento.
     */ 
  	public static function validarDepartamentoPorCodigo($codDepartamento){
  		$arrayDep=[];
  		$sql="select * from Departamento where CodDepartamento=?";
  		$resul=DBPDO::ejecutaConsulta($sql,[$codDepartamento]);	
  		if($resul->rowCount()){ 		
  			$departamento=$resul->fetchObject();
  			$arrayDep['CodDepartamento']=$departamento->CodDepartamento;
  			$arrayDep['DescDepartamento']=$departamento->DescDepartamento;
  			$arrayDep['FechaBaja']=$departamento->FechaBaja;
  		}
  		return $arrayDep;
  	}
  	/** 
     * Busca un departamento por su descripción. 
     * 
     * @author Patricia Martínez Lucena 
     * 
     * @param string $codDepartamento Código del departamento.
     * @return array Datos del departamento.
     */ 
  	public static function listarDepartamentos($descDepartamento){
  		$arrayDep=[];
  		$sql="select * from Departamento where descDepartamento like CONCAT('%', ?, '%')";
  		$resul=DBPDO::ejecutaConsulta($sql,["%$descDepartamento%"]);	
 		if($resul->rowCount()){ 
  			$arrayDep=$resul->fetchAll();
  		}
  		return $arrayDep;
  	}
  	/** 
     * Inserta un departamento. 
     * 
     * @author Patricia Martínez Lucena 
     * 
     * @param string $codDepartamento Código del departamento.
     * @param string $descDepartamento Descripción del departamento. 
	   * @param string $fechaBaja Fecha de baja del departamento.
     * @return boolean Insertado/No insertado.
     */ 
  	public static function insertarDepartamento($codDepartamento, $descDepartamento, $fechaBaja){ 
        $insertado = true; 
        $sql = "insert into Departamento (CodDepartamento,DescDepartamento,FechaBaja) values(?,?,?)";
        $resultSet = DBPDO::ejecutaConsulta($sql, [$codDepartamento, $descDepartamento, $fechaBaja]);
        if ($resultSet->rowCount() != 1) { 
            $insertado = false; 
        } 
        return $insertado; 
    } 
    /** 
     * Elimina un departamento. 
     * 
     * @author Patricia Martínez Lucena 
     * 
     * @param string $codDepartamento Código del departamento.
     * @return boolean Eliminado/No eliminado.
     */ 
    public static function borrarDepartamento($codDepartamento){ 
        $eliminado = true; 
        $sql = "delete from Departamento where CodDepartamento=?";
        $resultSet = DBPDO::ejecutaConsulta($sql, [$codDepartamento]);
        if ($resultSet->rowCount() != 1) { 
            $eliminado = false; 
        } 
        return $eliminado; 
    }
    /** 
     * Modifica un departamento. 
     * 
     * @author Patricia Martínez Lucena 
     * 
     * @param string $codDepartamento Código del departamento.
     * @param string $descDepartamento Descripción del departamento. 
	   * @param date $fechaBaja Fecha de baja del departamento.
     * @return boolean Modificado/No modificado.
     */ 
    public static function modificarDepartamento($codDepartamento, $descDepartamento, $fechaBaja){ 
        $modificado = true; 
        $sql = "update Departamento set DescDepartamento=? , FechaBaja=? where CodDepartamento=?";
        $resultSet = DBPDO::ejecutaConsulta($sql, [$codDepartamento, $descDepartamento, $fechaBaja]);
        if ($resultSet->rowCount() != 1) { 
            $modificado = false; 
        } 
        return $modificado; 
    } 
}
		
?>
