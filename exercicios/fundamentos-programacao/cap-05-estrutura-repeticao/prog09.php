<?php

/**
 * 16. Faça um programa que receba várias idades, calcule e mostre a média das idades digitadas. Finalize digitando idade igual a zero.
 */

require_once __DIR__ . '/../vendor/autoload.php';

$faker = Faker\Factory::create("pt_BR");

$countPessoas = 0;
$somaIdadePessoas = 0;

do {
    $idade = (int)trim(readline("Digite a idade | 0 para encerrar: "));

    if ($idade === 0) {
        break;
    }

    $countPessoas++;
    $somaIdadePessoas += $idade;

} while (true);

if (!empty($countPessoas)) {
    echo "Total de pessoas: " . $countPessoas . PHP_EOL;
    echo "Soma total das idades: " . $somaIdadePessoas . PHP_EOL;
    echo "Média das idades digitadas: " . number_format(($somaIdadePessoas / $countPessoas), 2, ',', '.') . PHP_EOL;
} else {
    echo "Não houve pessoas cadastradas..." . PHP_EOL;
}
