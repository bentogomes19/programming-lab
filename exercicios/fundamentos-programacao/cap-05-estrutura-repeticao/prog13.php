<?php

/**
 * 21. Em uma eleição presidencial existem quatro candidatos. Os votos são informados por meio de código.
 * Os códigos utilizados são:
 * 1, 2, 3, 4 Votos para os respectivos candidatos
 * 5 Voto nulo
 * 6 Voto em branco
 * Faça um programa que calcule e mostre:
 * ■■ o total de votos para cada candidato;
 * ■■ o total de votos nulos;
 * ■■ o total de votos em branco;
 * ■■ a porcentagem de votos nulos sobre o total de votos; e
 * ■■ a porcentagem de votos em branco sobre o total de votos.
 * Para finalizar o conjunto de votos, tem-se o valor zero e, para códigos inválidos, o programa deverá
 * mostrar uma mensagem.
 */

$totalVotosCand1  = 0;
$totalVotosCand2  = 0;
$totalVotosCand3  = 0;
$totalVotosCand4  = 0;
$totalVotosBranco = 0;
$totalVotosNulo   = 0;

while (true) {
    $voto = (int)(trim(readline("Voto 1,2,3,4,5,6: ")));
    if ($voto === 0) {
        readline("votação encerrada...");
        break;
    } else if (!in_array($voto, [1, 2, 3, 4, 5, 6], true)) {
        readline("Código inválido...Tente novamente....");
    }
    if ($voto === 1) {
        $totalVotosCand1++;
    } else if ($voto === 2) {
        $totalVotosCand2++;
    } else if ($voto === 3) {
        $totalVotosCand3++;
    } else if ($voto === 4) {
        $totalVotosCand4++;
    } else if ($voto === 5) {
        $totalVotosNulo++;
    } else if ($voto === 6) {
        $totalVotosBranco++;
    }
}

$totalVotos = $totalVotosCand1 + $totalVotosCand2 + $totalVotosCand3 + $totalVotosCand4 + $totalVotosBranco + $totalVotosNulo;
if (empty($totalVotos)) {
    readline("Não houve votos contabilizados....");
} else {
    echo "------- Total de Votos - Candidatos ------" . PHP_EOL;
    echo "Candidato 01: " . $totalVotosCand1 . " " . calcularPercentual($totalVotosCand1, $totalVotos) . PHP_EOL;
    echo "Candidato 02: " . $totalVotosCand2 . " " . calcularPercentual($totalVotosCand2, $totalVotos) . PHP_EOL;
    echo "Candidato 03: " . $totalVotosCand3 . " " . calcularPercentual($totalVotosCand3, $totalVotos) . PHP_EOL;
    echo "Candidato 04: " . $totalVotosCand4 . " " . calcularPercentual($totalVotosCand4, $totalVotos) . PHP_EOL;
    echo "-------------------------------------------" . PHP_EOL;
    echo "Votos brancos: " . $totalVotosNulo . PHP_EOL;
    echo "Votos Nulo: " . $totalVotosBranco . PHP_EOL;
    echo "Total de votos: " . $totalVotos . PHP_EOL;
    echo "Percentual de votos nulos sobre o total de votos: " . calcularPercentual($totalVotosNulo, $totalVotos) . PHP_EOL;
    echo "Percentual de votos em branco sobre o total de votos: " . calcularPercentual($totalVotosBranco, $totalVotos) . PHP_EOL;
}

/**
 * Cálculo de percentual
 *
 * @param int $numero1
 * @param int $numero2
 * @return string
 */
function calcularPercentual(int $numero1, int $numero2): string {
    return empty($numero1) || empty($numero2) ? "0,00%" : number_format((($numero1 / $numero2) * 100), 2, ',', '.') . "% ";
}





