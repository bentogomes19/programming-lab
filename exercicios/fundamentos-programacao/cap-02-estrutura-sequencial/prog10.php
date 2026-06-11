<?php

/**
 * 10. Faça um programa que calcule e mostre a área de um círculo. Sabe-se que: Área = p * R2
 *
 */

$raio = (double)(trim(readline("Raio do círculo: ")));

$area = 3.14 * pow($raio, 2);
echo $area;
