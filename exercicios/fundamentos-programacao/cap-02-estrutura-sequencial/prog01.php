<?php

/*1. Faça um programa que receba quatro números inteiros, calcule e mostre a soma desses números. */

$num1 = (int)(trim(readline("Numero 1: ")));
$num2 = (int)(trim(readline("Numero 2: ")));
$num3 = (int)(trim(readline("Numero 3: ")));
$num4 = (int)(trim(readline("Numero 4: ")));

$soma = $num1 + $num2 + $num3 + $num4;

echo $soma . PHP_EOL;
