<?php 
/**
* Controlador de inserción de un departamento.
* Realiza la inserción del departamento introducido.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 
$_SESSION['insertado']=''; 
require_once 'model/Departamento.php';
//inicializar entrada a falsa.
$entradaOK=false;
//inicializar array de almacenamiento de errores.
$errores=[
	'codigo'=>'',
	'descripcion'=>'',
	'fecha'=>''
];
//inicializar array de almacenamiento de los datos de los campos del formulario.
$campos=[
	'codigo'=>'',
	'descripcion'=>'',
	'fecha'=>''
];
//Acción si se ha pulsado el botón insertar.
if(isset($_POST['insertar'])){
//Necesita mi librería de funciones.
include 'funciones.php';
	//inicializar la entrada a correcta
	$entradaOK=true;
	//almacenar los datos de los campos en el array.
	$campos=[
		'codigo'=>$_POST['codigo'],
		'descripcion'=>$_POST['bdesc'],
		'fecha'=>$_POST['fechabaja']
	];
	//separar la fecha en año, mes y día.			
		$ano = substr($campos['fecha'], 0, 4);
		$mes   = substr($campos['fecha'], 5, 2);
		$dia = substr($campos['fecha'], -2);
		//fecha formato Base de datos.
		$fecha1=$ano.'-'.$mes.'-'.$dia;
		//fecha formato visual.
		$fecha2=$dia.'-'.$mes.'-'.$ano;
		//comprueba si es válido el texto escrito en el campo de código.
		if(validartexto($_POST['codigo'])){
			$entradaOK=false;
			//almacena en un array el error recibido.
			$errores['codigo']=validartextolongitud($campos['codigo'], 3);
		}
		//comprueba si es válido el texto escrito en el campo de descripción.
		if(validartexto($campos['descripcion'])){
			$entradaOK=false;
			//almacena en un array el error recibido.
			$errores['descripcion']=validartexto($campos['descripcion']);
		}
		//comprueba si es válido el texto escrito en el campo de fecha.
		if(validarfecha($fecha2)){
			$entradaOK=false;
			//almacena en un array el error recibido.
			$errores['fecha']=validarfecha($fecha2);
		}else{
			$fecha1=$ano.'-'.$mes.'-'.$dia;
		}
	}
//Acción si se pulsa el botón logoff.
if(isset($_POST['logoff'])){
	header('Location: index.php?location=inicio');
}
include 'view/layout.php';
//Acción si no se ha encontrado ningún error.
if($entradaOK){
	$insertado=Departamento::insertarDepartamento($campos['codigo'],$campos['descripcion'],$fecha1);
	if($insertado){
		print "se ha insertado";
	}else{
		print "No se ha podido insertar";
	}
}
?> 
