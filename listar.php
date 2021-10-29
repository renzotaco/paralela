<?php

$host = "localhost";	$puerto = "3306";	$usuario = "renzo";	$contrasena = "password";

if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
{ 
	echo "Error conectando a la base de datos.<br>"; 	exit(); 
}
else
{
	mysqli_select_db($link, "empresa");
	$query = "SELECT * FROM salarios limit 1000";
    $result = mysqli_query($link, $query); 

	echo "<table align='center' width='80%' border='2'>";
	echo "<tr><td>No</td><td>Empleado</td><td>Trabajo</td><td>Salario</td><td>Total</td></tr>";
	$i=0;
	while($row = mysqli_fetch_array($result))
	{ 
		$i++;
      echo "<tr><td>".$i."</td><td>".$row["EmployeeName"]."</td><td>".$row["JobTitle"]."</td><td>"
		.$row["TotalPay"]."</td><td>".$row["TotalPayBenefits"]."</td></tr>";
	} 
	echo "</table>";
    mysqli_free_result($result); 
}
    mysqli_close($link);
?>
 