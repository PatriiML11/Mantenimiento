<?php
/**
* Controlador de modificación de un departamento.
* Realiza la modificación del departamento seleccionado.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 
$_SESSION['modificado']='';
 require_once 'model/Departamento.php';
//inicializar entrada a falsa.
$entradaOK=false;
$modificado=false;
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
//Acción si se ha pulsado el botón 
if(isset($_POST['modificar'])){
//Necesita mi librería de funciones.
include 'funciones.php';
	//inicializar la entrada a correcta
	$entradaOK=true;
	//obtener valores de los campos
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
	if(Departamento::modificarDepartamento($campos['descripcion'],$fecha1,$_SESSION['departamentoModif']->getCodDepartamento())){
		$modificado=true;
	}
	//Acción si se ha modificado.
	if($modificado){
		header('Location: index.php?location=mantenimiento');
	}else{
		$_SESSION['modificado']="NO SE HA PODIDO MODIFICAR";
	}
	

}
