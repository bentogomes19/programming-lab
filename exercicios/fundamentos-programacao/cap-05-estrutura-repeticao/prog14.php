<?php

/**
 * 22. Faça um programa que receba a idade e a altura de várias pessoas, calcule e mostre a média das alturas
 * daquelas com mais de 50 anos. Para encerrar a entrada de dados, digite idade menor ou igual a zero.
 */

$countPessoaIdade50       = 0;
$somaAlturaPessoasIdade50 = 0;
while (true) {
    $idade = (int)(trim(readline("Idade: ")));
    if ($idade <= 0) {
        readline("Encerrando programa...");
        break;
    }
    $altura = (float)(trim(readline("Digite a altura (cm): ")));
    if ($idade > 50) {
        $countPessoaIdade50++;
        $somaAlturaPessoasIdade50 += $altura;
    }
}

echo "Média da alturas daquelas com mais de 50 anos: " . number_format(($somaAlturaPessoasIdade50 / $countPessoaIdade50), 2, ',', '.') . PHP_EOL;
