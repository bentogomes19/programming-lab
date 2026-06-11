<?php

/**
 * 9. Faça um programa que calcule e mostre a área de um triângulo. Sabe-se que: Área = (base * altura)/2.
 */

$base   = (float)(trim(readline("Base do triangulo: ")));
$altura = (float)(trim(readline("Altura do triangulo: ")));

echo "Área do triângulo: " . number_format(calcularArea($base, $altura), 2, ',', '.');

/**
 * Retorna a área do triangulo.
 *
 * @param  float $base
 * @param  float $altura
 * @return float
 */
function calcularArea(float $base, float $altura): float {
    return ($base * $altura) / 2;
}