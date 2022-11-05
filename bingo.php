<?php
        echo "<hr><center>";
        echo "Ingrese numero de cartones de bingo";
        echo "<form action='bingo.php' method='POST'>";
        echo "<input type='text' name='cartones'>";
        echo "<input type='submit' name='enviar'>";
        echo "</form>";
        echo "</center><hr>";

    if (isset($_POST['enviar']))
    {
        $cartones = $_POST['cartones'];
        for ($b=1;$b<=$cartones;$b++)
        {
            echo "<center>Carton No: ".$b."</center>";
            echo "<table align='center' border='2'>";
            echo "<tr><td>B</td><td>I</td><td>N</td><td>G</td><td>O</td></tr>";
            for($y=1;$y<=5;$y++)
            {
                echo "<tr>";
                for($x=1;$x<=5;$x++)
                {
                    $nro=rand(1,75);
                    echo "<td>".$nro."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }

?>