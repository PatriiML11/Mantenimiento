<?php
/**
 * Usuario que se va a identificar en el login.
 *
 * @author Patricia Martínez Lucena
 * Fecha de última modificación: 26/01/2017
 */
	/*
	 * Utiliza la clase UsuarioPDO.
	 */
	require_once 'UsuarioPDO.php';
	/*
	 * Definir clase.
	 */
	class Usuario{
		/*
		 * Definir atributos de la clase.
		 */
		protected $codUsuario;
		protected $descUsuario;
		protected $password;
		protected $perfil;
		 /**
	     * Constructor del objeto.
	     *
	     * @param string $codUsuario Código del usuario
	     * @param string $descUsuario Descripción del usuario
	     * @param string password Contraseña del usuario
	     * @param string $perfil Perfil del usuario
	     * @param string $ultimaConexion Última conexión del usuario a la aplicación
	     */
		public function __construct($codUsuario, $descUsuario, $password, $perfil){
			$this->codUsuario=$codUsuario;
			$this->descUsuario=$descUsuario;
			$this->password=$password;
			$this->perfil=$perfil;
		}
		/** 
	     * Instancia un objeto Usuario. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codUsuario Código del usuario 
	     * @param string $password Contraseña del usuario 
	     * @return Usuario|null Objeto usuario / null 
	     */ 
		public static function validarUsuario($codUsuario,$password){
			$usuario=null;
			$user=UsuarioPDO::validarUsuario($codUsuario,$password);
			if($user){
				$usuario=new Usuario($codUsuario,$user['DescUsuario'],$password,$user['Perfil']);
			}
			return $usuario;
		}
		/** 
	     * Obtiene el código de un usuario. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $codUsuario Código del usuario 
	     * @return string|null Código del usuario / null 
	     */
		public function getCodUsuario(){
			return $this->codUsuario;
		}
		/** 
	     * Obtiene la descripción de un usuario. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $descUsuario Descripción del usuario 
	     * @return string|null Descripción del usuario / null 
	     */
		public function getDescUsuario(){
			return $this->descUsuario;
		}
		/** 
	     * Obtiene la contraseña de un usuario. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $password Contraseña del usuario 
	     * @return string|null Contraseña del usuario / null 
	     */
		public function getPassword(){
			return $this->password;
		}
		/** 
	     * Obtiene el perfil de un usuario. 
	     * 
	     * @author Patricia Martínez Lucena 
	     * 
	     * @param string $perfil Perfil del usuario 
	     * @return string|null Perfil del usuario / null 
	     */
		public function getPerfil(){
			return $this->perfil;
		}
		
	}
		
?>
	