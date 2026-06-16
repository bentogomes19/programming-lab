<?php

/**
 * 6. Uma loja utiliza o código V para transação à vista e P para transação a prazo. Faça um programa que receba
 * o código e o valor de quinze transações, calcule e mostre:
 * ■■ o valor total das compras à vista;
 * ■■ o valor total das compras a prazo;
 * ■■ o valor total das compras efetuadas; e
 * ■■ o valor da primeira prestação das compras a prazo juntas, sabendo-se que serão pagas em três vezes.
 */

$totalAvista  = 0;
$totalAprazo  = 0;
$totalCompras = 0;

for ($i = 0; $i < 15; $i++) {
    $codigo = (trim(readline("Infome o código V - Transação à vista | P - Transação  a prazo: ")));
    if ($codigo != "V" && $codigo != "P" && $codigo != "v" && $codigo != "p") {
        readline("Código inválido....Tente novamente...");
        break;
    }

    $transacao = (double)(trim(readline("Informe o valor da transação (R$): ")));
    if ($codigo === "V" || $codigo === "v") {
        $totalAvista += $transacao;
    } else if ($codigo === "P" || $codigo === "p") {
        $totalAprazo += $transacao;
    }

    $totalCompras += $transacao;
}

echo "valor total das compras à vista: R$ " . number_format($totalAvista, 2, ',', '.') . PHP_EOL;
echo "valor total das compras a prazo: R$ " . number_format($totalAprazo, 2, ',', '.') . PHP_EOL;
echo "valor total das compras efetuadas: R$ " . number_format($totalCompras, 2, ',', '.') . PHP_EOL;