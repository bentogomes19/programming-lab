<?php


for ($i = 0; $i <= 5; $i++) {
    echo "Grupo - " . ($i+1) . PHP_EOL;
    $valorA = (int)(trim(readline("A: ")));
    $valorB = (int)(trim(readline("B: ")));
    $valorC = (int)(trim(readline("C: ")));


    /* Mostrando valores */
    echo $valorA . ' - ' . $valorB . ' - ' . $valorC . PHP_EOL;
}
