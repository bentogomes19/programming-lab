<?php

/**
 * 8. Faça um programa que receba a idade, o peso, a altura, a cor dos olhos (A — azul; P — preto; V — verde; e
 * C — castanho) e a cor dos cabelos (P — preto; C — castanho; L — louro; e R — ruivo) de seis pessoas, e que
 * calcule e mostre:
 * ■■ a quantidade de pessoas com idade superior a 50 anos e peso inferior a 60 kg;
 * ■■ a média das idades das pessoas com altura inferior a 1,50 m;
 * ■■ a porcentagem de pessoas com olhos azuis entre todas as pessoas analisadas; e
 * ■■ a quantidade de pessoas ruivas e que não possuem olhos azuis.
 */

$countPessoasIdade50Anos = 0;
$qtdPessoasIdade = 0;
$totalPessoasIdade = 0;
$countPessoasAzul = 0;
$countPessoasRuivas = 0;

/* Recebendo a idade de 6 pessoas */
for ($i = 0; $i < 6; $i++) {
    $idade         = (int)(trim(readline("Idade: ")));
    $peso          = (float)(trim(readline("Peso (KG): ")));
    $altura        = (float)(trim(readline("Altura (cm): ")));
    $corDosOlhos   = (trim(readline("Cor dos Olhos (A - Azul | P - Preto | V - Verde | C - castanho): ")));
    $corDosCabelos = (trim(readline("Cor dos Cabelos (P - Preto | C - castanho | L - louro | R - ruivo): ")));

    if ($idade > 50 && $peso < 60) {
        $countPessoasIdade50Anos++;
    }
    if ($altura < 150) {
        $qtdPessoasIdade++;
        $totalPessoasIdade += $idade;
    }
    if ($corDosOlhos === "A") {
        $countPessoasAzul++;
    }
    if ($corDosCabelos === "R" && $corDosOlhos != "A") {
        $countPessoasRuivas++;
    }

}

echo "Quantidade de pessoas com idade superior a 50 anos e peso inferior a 60 kg: " . $countPessoasIdade50Anos . PHP_EOL;

if ($qtdPessoasIdade > 0) {
    echo "a média das idades das pessoas com altura inferior a 1,50 m: " . number_format(($totalPessoasIdade / $qtdPessoasIdade), 2, ',', '.') . PHP_EOL;
} else {
    echo "Nenhuma pessoa possui altura inferior a 1,50m" . PHP_EOL;
}

echo "a porcentagem de pessoas com olhos azuis entre todas as pessoas analisadas: " . number_format(($countPessoasAzul / 6) * 100, 2, ',', '.') . PHP_EOL;
echo "a quantidade de pessoas ruivas e que não possuem olhos azuis: " . $countPessoasRuivas . PHP_EOL;