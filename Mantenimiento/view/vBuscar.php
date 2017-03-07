<?php
/**
* Vista Buscar.
* Interface de búsqueda de departamentos.
* 
* @author Patricia Martínez Lucena
* Fecha de última modificación: 22/02/2017 
*/ 
 require_once 'model/Departamento.php';
?> 
<button name="logoff" id="logoff"><a href="logoff.php">Logoff</a></button>
<br/>
<br/>
<div class="formularios">
	<form action="./index.php?location=mantenimiento" method="post" name="formu1" class="formu1">
		<br/>
		<div class="botones">
			<input type="submit" name="volver" value="Volver"/>
			
		</div>
		<br/>
		<table>
			<thead>
				<tr>
					<th>CODIGO</th>
					<th>DESCRIPCION</th>
					<th>FECHABAJA</th>
				</tr>
			</thead>
						