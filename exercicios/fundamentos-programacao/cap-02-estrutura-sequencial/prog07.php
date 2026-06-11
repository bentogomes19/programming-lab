<?php

/**
 * 7. Faça um programa que receba o salário base de um funcionário, calcule e mostre seu salário a receber,
 * sabendo-se que o funcionário tem gratificação de R$ 50 e paga imposto de 10% sobre o salário base.
 */

$salarioBaseFuncionario = (float)(trim(readline("Salário Base Funcionário (R$): ")));

$imposto = $salarioBaseFuncionario * (10 / 100);
$salarioReceber = $salarioBaseFuncionario + 50 - $imposto;

echo "Salário a receber: R$ " . number_format($salarioReceber, 2, ',', '.') . PHP_EOL;