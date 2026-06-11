<?php

/**
 * 3. Faça um programa que receba dois números e mostre o menor.
 */

$numero1 = (float)(trim(readline("Numero 1: ")));
$numero2 = (float)(trim(readline("Numero 2: ")));

if ($numero1 > $numero2) {
    echo $numero1 . " é maior que o " . $numero2 . PHP_EOL;
} else {
    echo $numero2 . " é maior que o " . $numero1 . PHP_EOL;
}