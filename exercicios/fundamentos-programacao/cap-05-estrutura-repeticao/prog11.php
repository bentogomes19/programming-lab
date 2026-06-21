<?php

/**
 * 19. Faça um programa que receba o tipo da ação, ou seja, uma letra a ser comercializada na bolsa de valores,
 * o preço de compra e o preço de venda de cada ação e que calcule e mostre:
 * ■■ o lucro de cada ação comercializada;
 * ■■ a quantidade de ações com lucro superior a R$ 1.000,00;
 * ■■ a quantidade de ações com lucro inferior a R$ 200,00;
 * ■■ o lucro total da empresa.
 * Finalize com o tipo de ação ‘F’.
 */

$countAcoesSuperior1000 = 0;
$countAcoesInferior200  = 0;
$lucroTotal             = 0;

do {

    $tipoAcao = mb_strtoupper(trim(readline("Tipo da ação | F - Finalizar: ")));
    if (str_contains($tipoAcao, 'F')) {
        break;
    }

    $precoCompra = (double)(trim(readline("Ação: " . $tipoAcao . " | Digite o preço de compra (R$): ")));
    $precoVenda  = (double)(trim(readline("Ação: " . $tipoAcao . " | Digite o preço de venda (R$): ")));

    $lucro = $precoCompra - $precoVenda;

    if ($lucro > 1000) {
        $countAcoesSuperior1000++;
    } else if ($lucro < 200) {
        $countAcoesInferior200++;
    }

    $lucroTotal += $lucro;
    echo "Ação: " . $tipoAcao . " Lucro: R$ " . number_format($lucro, 2, ',', '.') . PHP_EOL;

} while (true);

echo "quantidade de ações com lucro superior a R$ 1.000,00: " . $countAcoesSuperior1000 . PHP_EOL;
echo "quantidade de ações com lucro inferior a R$ 200,00: " . $countAcoesInferior200 . PHP_EOL;
echo "lucro total da empresa: R$ " . $lucroTotal . PHP_EOL;
