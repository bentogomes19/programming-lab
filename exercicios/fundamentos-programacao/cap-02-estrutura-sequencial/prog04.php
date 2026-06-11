<?php

/*4. Faça um programa que receba o salário de um funcionário, calcule e mostre o novo salário, sabendo-se
que este sofreu um aumento de 25%.*/

$salario     = (float)(trim(readline("Salário Funcionário (R$): ")));
$novoSalario = ($salario * 0.25) + $salario;

echo "Salário Atual: R$ " . number_format($salario, 2, ',', '.') . PHP_EOL;
echo "Novo salário: R$ " . number_format($novoSalario, 2, ',', '.') . PHP_EOL;