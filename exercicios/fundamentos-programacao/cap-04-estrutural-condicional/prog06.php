<?php

/**
 * Exercício 5 - Operações com dois números.
 *
 * Faça um programa que receba dois números e execute uma operação
 * de acordo com a escolha do usuário.
 *
 * Opções disponíveis:
 * 1 - Média entre os números digitados.
 * 2 - Diferença do maior pelo menor.
 * 3 - Produto entre os números digitados.
 * 4 - Divisão do primeiro pelo segundo.
 *
 * Regras:
 * * Se a opção digitada for inválida, exibir uma mensagem de erro
 * e encerrar a execução do programa.
 * * Na opção 4, o segundo número deve ser diferente de zero.
 */


$number1 = (float)(trim(readline("Num 1: ")));
$number2 = (float)(trim(readline("Num 2: ")));

echo "Opções Disponíveis:" . PHP_EOL;
echo "1 - Média entre os números digitados." . PHP_EOL;
echo "2 - Diferença do maior pelo menor." . PHP_EOL;
echo "3 - Produto entre os números digitados." . PHP_EOL;
echo "4 - Divisão do primeiro pelo segundo." . PHP_EOL;

$option = (int)(trim(readline("Digite uma opção: ")));

if ($option > 4 || $option <= 0) {
    echo "Opção inválida... Encerrando.";
} else {
    if ($option === 1) {

        /* Calcula a média entre os dois números digitados */
        $average = $number1 / $number2;
        echo "Média: " . $average . PHP_EOL;

    } else if ($option === 2) {
        if ($number1 > $number2) {
            $difference = $number1 - $number2;
        } else {
            $difference = $number2 - $number1;
        }
        echo "Diferença do maior pelo menor: " . $difference . PHP_EOL;

    } else if ($option === 3) {
        echo "Produto entre os números digitados:" . ($number1 * $number2) . PHP_EOL;
    } else if ($option === 4) {
        if ($number2 == 0 ) {
            echo "Não é possível dividir por zero.";
        } else {
            echo "Divisão do primeiro pelo segundo: " . ($number1 / $number2) . PHP_EOL;
        }
    }
}


