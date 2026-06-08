<?php

/**
 * 1. Faça um programa que preencha um vetor com nove números inteiros, calcule e mostre os números
 * primos e suas respectivas posições.
 */


$array = [1,1,2,3,4,5,6,7,8];

function program(array $array): void {

    for ($i = 1; $i <= 9; $i++) {
        $cont = 0;
        for ($j = 1; $j <= $array[$i]; $j++) {
            if ($array[$i] % $j == 0) {
                $cont++;
            }
            if ($cont <= 2) {
                echo $array[$i] . PHP_EOL;
                echo $i;
            }
        }
    }

}


program($array);