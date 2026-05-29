<?php

$numero1 = (float)(trim(readline("Numero 1: ")));
$numero2 = (float)(trim(readline("Numero 2: ")));
$numero3 = (float)(trim(readline("Numero 3: ")));

if ($numero1 > $numero2 && $numero1 > $numero3) {
    echo "Maior Número: " . $numero1 . PHP_EOL;
} else if ($numero2 > $numero1 && $numero2 > $numero3) {
    echo "Maior Número: " . $numero2 . PHP_EOL;
} else if ($numero3 > $numero1 && $numero3 > $numero2) {
    echo "Maior Número: " . $numero3 . PHP_EOL;
}