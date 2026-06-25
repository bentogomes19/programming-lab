<?php

/**
 * . Faça um programa que preencha um vetor com quinze elementos inteiros e verifique a existência de elementos
 * iguais a 30, mostrando as posições em que apareceram.
 */

$vetor = [23, 30, 65, 30, 6, 30, 87, 12, 14, 28, 98, 112, 345, 667, 700];
$listaPosicoes = "";

foreach ($vetor as $indice => $numero) {
    if ($numero === 30) {
        $listaPosicoes .= $indice . " ";
    }
}

echo "Posições dos números iguais a 30: " . $listaPosicoes . PHP_EOL;