<?php

/**
 * 2. Faça um programa que preencha um vetor com sete números inteiros, calcule e mostre:
 * ■■ os números múltiplos de 2;
 * ■■ os números múltiplos de 3;
 * ■■ os números múltiplos de 2 e de 3.
 */

$vetor = [32, 9, 24, 78, 98, 23, 35];

$listaMultiplos2 = "";
$listaMultiplos3 = "";
$listaMultiplos2e3 = "";

foreach ($vetor as $numero) {
    if ($numero % 2 === 0) {
        $listaMultiplos2 .= $numero . " ";
    }
    if ($numero % 3 === 0) {
        $listaMultiplos3 .= $numero . " ";
    }
    if (($numero % 2 === 0) && ($numero % 3 === 0)) {
        $listaMultiplos2e3 .= $numero . " ";
    }
}

echo "Múltiplos de 2: " . $listaMultiplos2 . PHP_EOL;
echo "Múltiplos de 3: " . $listaMultiplos3 . PHP_EOL;
echo "Múltiplos de 2 e 3: " . $listaMultiplos2e3 . PHP_EOL;