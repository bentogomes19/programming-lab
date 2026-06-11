<?php

/**
 * 2. Faça um programa que receba duas notas, calcule e mostre a média aritmética e a mensagem que se encontra
 * na tabela a seguir:
 * MÉDIA aritmética     mensagem
 * 0,0      3,0         Reprovado
 * 3,0      7,0          Exame
 * 7,0 1    0,0         Aprovado
 */

$nota1 = (float)(trim(readline("Digite a primeira nota: ")));
$nota2 = (float)(trim(readline("Digite a segunda nota: ")));

$mediaFinal = ($nota1 + $nota2) / 2;

if ($mediaFinal >= 7) {
    echo "APROVADO!" . PHP_EOL;
} else if ($mediaFinal < 7 && $mediaFinal >= 3 ) {
    echo "EXAME!" . PHP_EOL;
} else {
    echo "REPROVADO!" . PHP_EOL;
}