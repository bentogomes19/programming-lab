<?php


$vetor1 = [3, 5, 4, 2, 2, 5, 3, 2, 5, 9];
$vetor2 = [7, 15, 20, 0, 18, 4, 55, 23, 8, 6];

$vetorResultante = [];

$j = 0;
for ($i = 0; $i <= 9; $i++) {
    $vetorResultante[$j] = $vetor1[$i];
    $j++;
    $vetorResultante[$j] = $vetor2[$i];
    $j++;
}

for ($i = 0; $i < 20; $i++) {
    echo $vetorResultante[$i] . ' | ';
}
