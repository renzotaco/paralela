<?php

$tasks = [
  "fetch_remote_data",
  "post_async_updates",
  "clear_caches",
  "notify_admin",
];

// Este bucle crea un nuevo fork para cada uno de los elementos de $tasks.
foreach ($tasks as $task) {
  $pid = pcntl_fork();

  if ($pid == -1) {
    exit("Error forking...\n");
  }
  else if ($pid == 0) {
    execute_task($task);
    exit();
  }
}

// Este bucle while mantiene el proceso padre hasta que todos los hilos hijos se completan, momento en el que el script continúa ejecutándose.
while(pcntl_waitpid(0, $status) != -1);

// Podría tener más código aquí.
echo "Hacer cosas después de que toda la ejecución paralela se haya completado.\n";

/**
 * Método de ayuda para ejecutar una tarea.
 */
function execute_task($task_id) {
  echo "Tarea inicial: ${task_id}\n";

  // Simular la realización de un trabajo real con sleep().
  $execution_time = rand(5, 10);
  sleep($execution_time);

  echo "Tarea completada: ${task_id}. Tomó ${execution_time} segundos.\n";
}