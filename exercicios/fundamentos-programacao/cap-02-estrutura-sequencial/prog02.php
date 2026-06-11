<?php

/*2. Faça um programa que receba três notas, calcule e mostre a média aritmética. */

$num1 = (float)(trim(readline("Nota 1: ")));
$num2 = (float)(trim(readline("Nota 2: ")));
$num3 = (float)(trim(readline("Nota 3: ")));

$mediaAritmetica = ($num1 + $num2 + $num3) / 3;

echo "Média Aritmética: " . number_format($mediaAritmetica, 2, ',', '.') . PHP_EOL;