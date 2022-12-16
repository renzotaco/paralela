<?php

  $db = mysqli_connect("localhost", "renzo", "ujcm2022", "webscraping");
  if (!$db)
  {
     echo "<br><hr>error de conexiónion<hr><br>";
  }
  else
	echo "<hr>conexión exitosa<hr>";
 // mysql_select_db($db);
 

?>
