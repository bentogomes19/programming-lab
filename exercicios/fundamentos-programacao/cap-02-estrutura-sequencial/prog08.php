<?php

/**
 * 8. Faça um programa que receba o valor de um depósito e o valor da taxa de juros, calcule e mostre o
 * valor do rendimento e o valor total depois do rendimento.
 */

$deposito  = (float)(trim(readline("Deposito (R$): ")));
$taxaJuros = (float)(trim(readline("Juros (%): ")));

$rendimento = $deposito * ($taxaJuros / 100);
$total      = $deposito + $rendimento;

echo "Valor do Rendimento: R$ " . number_format($rendimento, 2, ',', '.') . PHP_EOL;
echo "Valor Total: R$ " . number_format($total, 2, ',', '.') . PHP_EOL;