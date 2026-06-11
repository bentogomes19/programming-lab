<?php

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