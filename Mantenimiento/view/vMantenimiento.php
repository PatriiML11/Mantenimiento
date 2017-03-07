<?php
/**
* Vista Mantenimiento de Departamentos.
* Interface de Mantenimiento de departamentos.
* 
* @author Patricia Martínez Lucena
* Fecha de última modificación: 22/02/2017 
*/ 
?>
<br/>
<br/>
<div class="formularios">
<div>		
<a href="./index.php?location=inicio"><button name="logoff">Logoff</button></a>
<a href="./index.php?location=insertar"><button name="insertar" >Insertar</button></a>
<form action="./index.php?location=mantenimiento" method="post" name="formu1" class="formu1">
	<div class="botones">

		</div>
		<br/>
			<button name="buscar" type="submit">Buscar</button>
		<h1>FORMULARIO</h1>
		<div class="datos">
	<div>
	<?php
		if(!empty($error)){
			print $error;
		}
	?>
	</div> 
			<p>DescDepartamento: <br/><input type="text" name="bdesc"  /></p>
			<br/>	
		</div>
		<br/>
</form>		
	</div>
<form>	
	<br/>
	<table>
		<thead>
			<tr>
				<th>CODIGO</th>
				<th>DESCRIPCION</th>
				<th>FECHABAJA</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($_SESSION['lista'] as $departamento){
				$codDepartamento=$departamento->getCodDepartamento();
				$descDepartamento=$departamento->getDescDepartamento();
				$fechaBaja=$departamento->getFechaBaja();
				print "<tr>";
				print "<td>";
				print $codDepartamento;
				print "</td>";
				print "<td>";
				print $descDepartamento;
				print "</td>";
				print "<td>";
				print $fechaBaja;
				print "</td>";
				print "<td>";
				echo "<a href='index.php?location=borrar&id=$codDepartamento' name='borrar'><img src='images/borrar.png'  class='btntab' alt='borrar' width='30px' height='30px'/></a></td><td><a href='index.php?location=modificar&id=$codDepartamento'><img src='images/editar.png' class='btntab' alt='editar' width='30px' height='30px'/></a>";
				print "</td>";
				print "</tr>";
			}
			?>

		</tbody>
	</table>
</form>
<br/>
<img src="./images/ArbolNavegacion.jpg" alt="navegacion">