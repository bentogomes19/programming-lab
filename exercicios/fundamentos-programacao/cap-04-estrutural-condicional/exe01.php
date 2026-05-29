<?php


$nota1 = (float)(trim(readline("Digite a primeira nota: ")));
$nota2 = (float)(trim(readline("Digite a segunda nota: ")));
$nota3 = (float)(trim(readline("Digite a terceira nota: ")));


$mediaFinal = ($nota1 + $nota2 + $nota3) / 3;

if ($mediaFinal >= 7) {
    echo "Aprovado!" . PHP_EOL;
} else {
    echo "Reprovado!" . PHP_EOL;
}