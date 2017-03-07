<?php
/**
* Modelo Departamento.
* Departamento.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 

	require_once 'DepartamentoPDO.php';
	class Departamento{
		protected $codDepartamento;
		protected $descDepartamento;
		protected $fechaBaja;
		 /**
	     * Constructor del objeto.
	     *
	     * @param string $codDepartamento Código del departamento
	     * @param string $descDepartamento Descripción del departamento
	     * @param date $fechaBaja Fecha de baja del departamento
	     */
		public function __construct($codDepartamento, $descDepartamento, $fechaBaja){
			$this->codDepartamento=$codDepartamento;
			$this->descDepartamento=$descDepartamento;
			$this->fechaBaja=$fechaBaja;
		}
		/** 
	     * Instancia un objeto departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $descDepartamento Descripción del departamento 
	     * @return array Objeto departamento / null 
	     */ 
		public static function buscarDepartamento($descDepartamento){
			$departamento=null;
			$arrayDep=DepartamentoPDO::validarDepartamento($descDepartamento);
			if($arrayDep){
				$departamento=new Departamento($arrayDep['CodDepartamento'],$arrayDep['DescDepartamento'],$arrayDep['FechaBaja']);
			}
			return $departamento;
		}
		/** 
	     * Instancia un objeto departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codDepartamento Código del departamento 
	     * @return array Objeto departamento / null 
	     */ 
		public static function buscarDepartamentoPorCodigo($codDepartamento){
			$departamento=null;
			$arrayDep=DepartamentoPDO::validarDepartamentoPorCodigo($codDepartamento);
			if($arrayDep){
				$departamento=new Departamento($arrayDep['CodDepartamento'],$arrayDep['DescDepartamento'],$arrayDep['FechaBaja']);
			}
			return $departamento;
		}
		/** 
	     * Instancia uno o varios objetos departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codDepartamento Código del departamento.
	     * @return array Objeto departamento / null 
	     */ 
		public static function listarDepartamentos($descDepartamento){
			$lista=[];
				$arrayDep=DepartamentoPDO::listarDepartamentos($descDepartamento);
				
					foreach($arrayDep as $fila){
						$departamento=new Departamento($fila['CodDepartamento'],$fila['DescDepartamento'],$fila['FechaBaja']);
						array_push($lista,$departamento);
					}
				
			return $lista;
		}
		/** 
	     * Inserta un departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codDepartamento Código del departamento.
	     * @param string $descDepartamento Descripción del departamento. 
	     * @param string $fechaBaja Fecha de baja del departamento.
	     * @return boolean Insertado/No insertado 
	     */ 
		public static function insertarDepartamento($codDepartamento,$descDepartamento,$fechaBaja){
			return DepartamentoPDO::insertarDepartamento($codDepartamento,$descDepartamento,$fechaBaja);
		}
		/** 
	     * Elimina un departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codDepartamento Código del departamento.
	     * @return boolean Eliminado/No eliminado 
	     */ 
		public static function borrarDepartamento($codDepartamento){
			return DepartamentoPDO::borrarDepartamento($codDepartamento);
		}
		/** 
	     * Modifica un departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codDepartamento Código del departamento.
	     * @param string $descDepartamento Descripción del departamento. 
	     * @param string $fechaBaja Fecha de baja del departamento.
	     * @return boolean Modificado/No modificado 
	     */ 
		public static function modificarDepartamento($codDepartamento,$descDepartamento,$fechaBaja){
			return DepartamentoPDO::modificarDepartamento($codDepartamento,$descDepartamento,$fechaBaja);
		}
		/** 
	     * Obtiene el código de un departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codDepartamento Código del departamento 
	     * @return string Código del departamento / null 
	     */ 
		public function getCodDepartamento(){
			return $this->codDepartamento;
		}
		/** 
	     * Obtiene la descripción de un departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $descDepartamento Descripción del departamento 
	     * @return string Descripción del departamento / null 
	     */ 
		public function getDescDepartamento(){
			return $this->descDepartamento;
		}
		/** 
	     * Obtiene la fecha de baja de un departamento. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param date $fechaBaja Fecha de baja del departamento 
	     * @return date Fecha de baja del departamento / null 
	     */ 
		public function getFechaBaja(){
			return $this->fechaBaja;
		}
	}
		
?>
	