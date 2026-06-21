<?php

/**
 * 20. Faça um programa que apresente o menu de opções a seguir:
 * Menu de opções:
 * 1. Média aritmética
 * 2. Média ponderada
 * 3. Sair
 * Digite a opção desejada.
 * Na opção 1: receber duas notas, calcular e mostrar a média aritmética.
 * Na opção 2: receber três notas e seus respectivos pesos, calcular e mostrar a média ponderada.
 * Na opção 3: sair do programa.
 * Verifique a possibilidade de opção inválida. Nesse caso, o programa deverá mostrar uma mensagem.
 */

while (true) {
    system('clear');
    echo "Menu de Opções" . PHP_EOL;
    echo "1. Média Aritmética" . PHP_EOL;
    echo "2. Média Ponderada" . PHP_EOL;
    echo "3. Sair" . PHP_EOL;
    $opcao = (trim(readline("Digite a opção desejada: ")));

    switch ((int)$opcao) {
        case 1:
            readline("Média Aritmética: " . number_format(calcularMediaAritmetica(), 2, ',', '.') . PHP_EOL);
            break;
        case 2:
            readline("Média Ponderada: " . number_format(calcularMediaPonderada(), 2, ',', '.') . PHP_EOL);
            break;
        case 3:
            break 2; // Sair do switch e sai do loop...
        default:
            readline("Opção inválida...Tente novamente....");
            break;
    }
}

/**
 * Calcula a média aritmética de duas notas.
 *
 * @return float
 */
function calcularMediaAritmetica(): float {
    $nota1 = (float)(trim(readline("Nota 1: ")));
    $nota2 = (float)(trim(readline("Nota 2: ")));
    return ($nota1 + $nota2) / 2;
}

/**
 * Calcula a média Ponderada
 *
 * @return float
 */
function calcularMediaPonderada(): float {
    $nota1     = (float)(trim(readline("Nota 1: ")));
    $nota2     = (float)(trim(readline("Nota 2: ")));
    $nota3     = (float)(trim(readline("Nota 3: ")));
    $pesoNota1 = (float)(trim(readline("Peso 1: ")));
    $pesoNota2 = (float)(trim(readline("Peso 2: ")));
    $pesoNota3 = (float)(trim(readline("Peso 3: ")));
    return (($nota1 * $pesoNota1) + ($nota2 * $pesoNota2) + ($nota3 * $pesoNota3)) / ($pesoNota1 + $pesoNota2 + $pesoNota3);
}