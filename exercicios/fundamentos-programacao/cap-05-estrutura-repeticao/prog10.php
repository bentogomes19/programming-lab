<?php

/**
 * 18. Foi feita uma pesquisa entre os habitantes de uma região. Foram coletados os dados de idade, sexo (M/F)
 * e salário. Faça um programa que calcule e mostre:
 * ■■ a média dos salários do grupo;
 * ■■ a maior e a menor idade do grupo;
 * ■■ a quantidade de mulheres com salário até R$ 200,00;
 * ■■ a idade e o sexo da pessoa que possui o menor salário.
 * Finalize a entrada de dados ao ser digitada uma idade negativa.
 */

require_once __DIR__ . '/../vendor/autoload.php';

$faker = Faker\Factory::create("pt_BR");

$countPessoas            = 0;
$somaSalarioPessoas      = 0;
$countMulheresSalario200 = 0;
$maiorIdade              = 0;
$menorIdade              = 0;
$menorSalario            = 9999999999;
$menorIdadeSalario       = 0;
$menorSexoSalario        = '';

do {
    $idade = (int)(trim(readline("Idade: ")));

    if ($idade === -1) {
        break;
    } else if ($idade > $maiorIdade) {
        $maiorIdade = $idade;
    } else {
        $menorIdade = $idade;
    }

    $sexo    = (trim(readline("Sexo da pessoa com " . $idade . " anos: ")));
    $salario = (float)(trim(readline("Salario (R$): ")));

    $countPessoas++;
    $somaSalarioPessoas += $salario;

    if ($sexo === "F" && $salario <= 200) {
        $countMulheresSalario200++;
    }

    if ($salario < $menorSalario) {
        $menorSalario      = $salario;
        $menorIdadeSalario = $idade;
        $menorSexoSalario  = $sexo;
    }

} while (true);


if ($countPessoas > 0) {
    echo "a média dos salários do grupo: R$ " . number_format(($somaSalarioPessoas / $countPessoas), 2, ',', '.') . PHP_EOL;
} else {
    echo "Não houve pessoas contabilizadas..." .PHP_EOL;
}

echo "Maior Idade do grupo: " . $maiorIdade . PHP_EOL;
echo "Menor Idade do grupo: " . $menorIdade . PHP_EOL;
echo "Quantidade de mulheres com salário até R$ 200,00: " . $countMulheresSalario200 . PHP_EOL;
echo "a idade e o sexo da pessoa que possui o menor salário: Idade: " . $menorIdadeSalario . " | " . $menorSexoSalario . PHP_EOL;




















