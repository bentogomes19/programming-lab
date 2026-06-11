<?php

/**
 * 6. Faça um programa que receba o salário base de um funcionário, calcule e mostre o salário a receber,
 * sabendo-se que o funcionário tem gratificação de 5% sobre o salário base e paga imposto de 7% também sobre o salário base.
 */

$salarioBaseFuncionario = (float)(trim(readline("Salário Base Funcionário (R$): ")));

$gratificacao = $salarioBaseFuncionario * (5 / 100);
$imposto      = $salarioBaseFuncionario * (7 / 100);

$salarioReceber = $salarioBaseFuncionario + $gratificacao - $imposto;

echo "Salário a receber " . number_format($salarioReceber, 2, ',', '.') . PHP_EOL;


