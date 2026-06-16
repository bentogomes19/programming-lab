<?php

/**
 * 5. Faça um programa que mostre as tabuadas dos números de 1 a 10.
 */

for ($i = 1; $i <= 10; $i++) {
    echo "Tabuada " . $i . PHP_EOL;
    for ($j = 0; $j <= 10; $j++) {
        echo $i . " x " . $j . " = " . ($i * $j) . PHP_EOL;
    }
}