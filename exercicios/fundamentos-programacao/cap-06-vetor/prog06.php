<?php

/**
 * 3. Faça um programa para controlar o estoque de mercadorias de uma empresa. Inicialmente, o programa deverá preencher dois vetores com dez posições cada, onde o primeiro corresponde ao código do produto e o
 * segundo, ao total desse produto em estoque. Logo após, o programa deverá ler um conjunto indeterminado
 * de dados contendo o código de um cliente e o código do produto que ele deseja comprar, juntamente com a
 * quantidade. Código do cliente igual a zero indica fim do programa. O programa deverá verificar:
 *
 * ■■ se o código do produto solicitado existe. Se existir, tentar atender ao pedido; caso contrário, exibir
 * mensagem Código inexistente;
 *
 * ■■ cada pedido feito por um cliente só pode ser atendido integralmente. Caso isso não seja possível,
 * escrever a mensagem Não temos estoque suficiente dessa mercadoria. Se puder atendê-lo, escrever
 * a mensagem Pedido atendido. Obrigado e volte sempre;
 *
 * ■■ efetuar a atualização do estoque somente se o pedido for atendido integralmente;
 *
 * ■■ no final do programa, escrever os códigos dos produtos com seus respectivos estoques já atualizados.
 */

/*Vetor 1: Apenas os códigos dos produtos (10 posições) */
$codigos = [3456, 5555, 6666, 1234, 2345, 79012, 1111, 2222, 3333, 4444];

/* Vetor 2: A quantidade em estoque de cada um (10 posições)*/
$estoques = [15, 8, 40, 5, 2, 100, 20, 0, 50, 12];

while (true) {
    $achou         = false;
    $codigoCliente = (int)(trim(readline("Código Cliente: ")));
    if ($codigoCliente === 0) {
        readline("Encerrando programa...");
        break;
    }

    $codigoProduto = (int)(trim(readline($codigoCliente . " | " . " Informe o código do produto: ")));
    foreach ($codigos as $indice => $produto) {
        if ($codigoProduto === $produto) {
            readline("Produto encontrado!!! CÓDIGO: " . $produto);
            $quantidade                    = (int)(trim(readline($codigoProduto . " | " . $codigoCliente . " | " . " Informe a quantidade: " )));
            $achou                         = true;
            $posicaoEncontrada             = $indice;
            if ($estoques[$posicaoEncontrada] >= $quantidade) {
                $estoques[$posicaoEncontrada] -= $quantidade;
                readline("Pedido Atendido. Obrigado e volte sempre!");
            } else {
                readline("Não temos estoque suficiente dessa mercadoria.");
            }
            break;
        }
    }

    if (!$achou) {
        readline("Código Inexistente...Tente novamente...");
    }
}

$listaProdutos = "";
$listaEstoques = "";
foreach ($codigos as $indice => $produto) {
    $listaProdutos .= $produto . " ";
    $listaEstoques .= $estoques[$indice] . " ";
}

echo "Produtos: " . $listaProdutos . PHP_EOL;
echo "Estoque: " . $listaEstoques . PHP_EOL;