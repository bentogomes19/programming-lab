<?php

/*3. Faça um programa que receba três notas e seus respectivos pesos, calcule e mostre a média ponderada.*/

$num1 = (float)(trim(readline("Nota 1: ")));
$num2 = (float)(trim(readline("Nota 2: ")));
$num3 = (float)(trim(readline("Nota 3: ")));
$peso1 = (float)(trim(readline("Peso Nota 1: ")));
$peso2 = (float)(trim(readline("Peso Nota 2: ")));
$peso3 = (float)(trim(readline("Peso Nota 3: ")));

$mediaPonderada = (($num1 * $peso1) + ($num2 * $peso2) + ($num3 * $peso3)) / ($peso1 + $peso2 + $peso3);

echo "Média Ponderada: " . number_format($mediaPonderada, 2, ',', '.') . PHP_EOL;
