<?php
        $file="webscraping.txt";

        $fp = fopen ( $file, "r" );

        echo "<h2><center>Noticias del Mundo</center></h2><hr width='80%'>";
        echo "<table align='center' border='2' width='80%'><tr><td>No.</td><td>Titulo</td><td>Descripcion</td><td>Fecha</td></tr>";
	$i=0;
        while (!feof($fp))
        { // Mientras hay líneas que leer...
		$i++;
                $row = fgets($fp);
                $n =  explode("|", $row);
                echo "<tr><td>".$i."</td><td>".$n[0]."</td><td>".$n[1]."</td><td>".$n[2]."</td></tr>";
        }
        echo "</table>";
        fclose ( $fp );

?>
