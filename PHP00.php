<?php

// Otros códigos

$pid = pcntl_fork(); // proceso de FORK

echo "Código que se ejecutarán los procesos padre e hijo<br>";

if ($pid > 0){
    echo "Soy el proceso padre, la identificación del proceso hijo que creé es {$pid}<br>".PHP_EOL;
}else if ($pid == 0){
    echo 'Soy un proceso infantil<br>'.PHP_EOL;
}else{
    echo 'Proceso de horquilla fallido<br>'.PHP_EOL;
}

?>
