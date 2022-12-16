<?php
        $file="webscraping.txt";
	$db = mysqli_connect("localhost", "renzo", "ujcm2022", "webscraping");
	if (!$db)
	{
		echo "<br><hr>error de conexiónion<hr><br>";
	}
	else
	{
          $fp = fopen ( $file, "r" );
	  $fecha=date ( "mdYhis" , time() );
          echo "<h2><center>Noticias del Mundo</center></h2><hr width='80%'>";
          echo "<table align='center' border='2' width='80%'><tr><td>No.</td><td>Titulo</td><td>Descripcion</td><td>Fecha</td></tr>";
	  $i=0;
          while (!feof($fp))
          {   // Mientras hay líneas que leer...
		$i++;
                $row = fgets($fp);
                $n =  explode("|", $row);
		if ( ($n[0]<>'') and ($n[1]<>'') and ($n[2]<>'') )
		{
                  echo "<tr><td>".$i."</td><td>".$n[0]."</td><td>".$n[1]."</td><td>".$n[2]."</td></tr>";
                  $sql="insert into noticias (id, titulo, descripcion, fecpub, fecha) values (NULL, '".$n[0]."','".$n[1]."','".$n[2]."','".$fecha."')";
		  mysqli_query($db, $sql);
		}
          }
          echo "</table>";
	}
        fclose ( $fp );
	mysqli_close($db);
?>
