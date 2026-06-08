<?php

/**
 * 2. Uma pequena loja de artesanato possui apenas um vendedor e comercializa dez tipos de objetos. O
 * vendedor recebe, mensalmente, salário de R$ 545,00, acrescido de 5% do valor total de suas vendas.
 * O valor unitário dos objetos deve ser informado e armazenado em um vetor; a quantidade vendida de
 * cada peça deve ficar em outro vetor, mas na mesma posição. Crie um programa que receba os preços
 * e as quantidades vendidas, armazenando-os em seus respectivos vetores (ambos com tamanho dez).
 * Depois, determine e mostre:
 *
 * ■■ um relatório contendo: quantidade vendida, valor unitário e valor total de cada objeto. Ao final,
 * deverão ser mostrados o valor geral das vendas e o valor da comissão que será paga ao vendedor; e
 *
 * ■■ o valor do objeto mais vendido e sua posição no vetor (não se preocupe com empates).
 */

$valorObjeto = [12.56, 13, 23, 67, 10, 30, 25, 32, 60, 120];
$quantidades = [2, 20, 30, 11, 30, 50, 10, 20, 70, 90];

/**
 * Gera o relatório de vendas da loja
 *
 * @param array $quantidades
 * @return void
 */
function GerarRelatorio(array $quantidades, array $valorObjeto): void {
    $valorGeralVendas = 0;
    $maiorQuantidade = 0;
    $posicaoMaisVendido = 0;
    for ($i = 0; $i <= 9; $i++) {

        /* Lista os dados como (quantidade vendida, valor unitário e valor total de cada objeto.) */
        echo "Quantidade total de objetos: " . $quantidades[$i] . ' | Valor Unit (R$) ' . $valorObjeto[$i] . ' | Valor Total R$ ' . ($quantidades[$i] * $valorObjeto[$i]) . PHP_EOL;

        /* Calculando o valor geral das vendas */
        $valorGeralVendas += ($quantidades[$i] * $valorObjeto[$i]);

        if ($quantidades[$i] > $maiorQuantidade) {
            $maiorQuantidade    = $quantidades[$i];
            $posicaoMaisVendido = $i;
        }

    }

    echo "----------------------------------------------------" . PHP_EOL;
    echo "Valor geral das vendas: R$ " . number_format($valorGeralVendas, 2, ',', '.') . PHP_EOL;
    echo "Comissão ao vendedor R$: " . number_format(($valorGeralVendas * 0.05), 2, ',', '.') . PHP_EOL;
    echo "Valor do Objeto mais vendido: R$ " . number_format($valorObjeto[$posicaoMaisVendido], 2, ',', '.') . " - " . $maiorQuantidade . PHP_EOL;
}

echo "---- Relatório Geral ----" . PHP_EOL;
GerarRelatorio($quantidades, $valorObjeto);

