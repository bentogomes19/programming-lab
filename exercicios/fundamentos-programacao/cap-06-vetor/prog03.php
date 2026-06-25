<?php

/**
 * 1. Faça um programa que preencha um vetor com seis elementos numéricos inteiros. Calcule e mostre:
 * ■■ todos os números pares;
 * ■■ a quantidade de números pares;
 * ■■ todos os números ímpares;
 * ■■ a quantidade de números ímpares.
 */

$vetor        = [2, 4, 5, 7, 8];
$countPares   = 0;
$countImpares = 0;
$listaImpares = "";
$listaPares   = "";

foreach ($vetor as $numero) {
    if ($numero % 2 === 0) {
        $listaPares .= $numero . " ";
        $countPares++;
    } else {
        $listaImpares .= $numero . " ";
        $countImpares++;
    }
}

echo "Pares: " . $listaPares . PHP_EOL;
echo "Ímpares: " . $listaImpares . PHP_EOL;
echo "Quantidade números pares: " . $countPares . PHP_EOL;
echo "Quantidade números ímpares: " . $countImpares . PHP_EOL;