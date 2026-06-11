<?php

/**
 * 5. Faça um programa que receba o salário de um funcionário e o percentual de aumento, calcule e mostre
 * o valor do aumento e o novo salário.
 */

$salarioFuncionario = (float)(trim(readline("Salário Funcionário (R$): ")));
$percentualAumento = (float)(trim(readline("Percentual de aumento (%): ")));

$valorAumento = $salarioFuncionario * ($percentualAumento / 100);
$novoSalario  = $valorAumento + $salarioFuncionario;

echo "Valor do aumento: R$ " . number_format($valorAumento, 2, ',', '.') . PHP_EOL;
echo "Novo Salário: R$ " . number_format($novoSalario, 2, ',', '.') . PHP_EOL;

