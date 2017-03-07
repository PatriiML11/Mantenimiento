<?php 
/** 
* Controlador de búsqueda de departamento.
* Realiza la búsqueda del departamento o departamentos seleccionados.
* 
* @author Patricia Martínez Lucena 
* Fecha de última modificación: 22/02/2017 
*/ 
require_once 'model/Departamento.php';
require_once 'view/layout.php';
//Almacenar en una variable la lista de los departamentos.
$resul=Departamento::listarDepartamentos($_POST['bdesc']);
    //Recorrer el array devuelto.
    foreach ($resul as $departamento) {
        //Almacenar cada valor en una variable.
        $codDepartamento = $departamento->getCodDepartamento(); 
        $descDepartamento = $departamento->getDescDepartamento(); 
        $fechaBaja = $departamento->getFechaBaja(); 
        print "<tbody>"; 
        print "<tr>"; 
        print "<td>"; 
        print  $codDepartamento; 
        print "</td>"; 
        print "<td>"; 
        print $descDepartamento; 
        print "</td>"; 
        print "<td>"; 
        print $fechaBaja; 
        print "</td>"; 
        print "<td>"; 
        echo "<a href='index.php?location=borrar&id=$codDepartamento' name='borrar'><img src='images/borrar.png' alt='borrar' width='30px' height='30px'/></a></td><td><a href='index.php?location=modificar&id=$codDepartamento' ><img src='images/editar.png' alt='editar'  width='30px' height='30px'/></a>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
    print "</form>";
?> 
