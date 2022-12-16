<?php
        $file="webscraping.txt";
	$db = mysqli_connect("localhost", "renzo", "ujcm2022", "webscraping");
	if (!$db)
	{
		echo "<br><hr>error de conexiónion<hr><br>";
	}
	else
	{
          echo "<h2><center>Noticias del Mundo Desde la Base de datos</center></h2><hr width='80%'>";
          echo "<table align='center' border='2' width='80%'><tr><td>No.</td><td>Titulo</td><td>Descripcion</td><td>Fecha</td></tr>";
	  $sql="select * from noticias order by fecha desc";
	  $result = mysqli_query($db, $sql);
	  while($r = mysqli_fetch_assoc($result))
          {   // Mientras hay líneas que leer...
             echo "<tr><td>".$r['id']."</td><td>".$r['titulo']."</td><td>".$r['descripcion']."</td><td>".$r['fecpub']."</td><td>".$r['fecha']."</td></tr>";
          }
          echo "</table>";
	}
	mysqli_close($db);
?>
