<?php


$vetor          = [];
$vetorPositivos = [];
$cont_positivos = 0;
$cont_negativos = 0;

for ($i = 0; $i < 8; $i++) {
    $vetor[$i] = (int)(trim(readline("Numero: ")));

    /* Verificando se o número é positivo ou negativo */
    if ($vetor[$i] >= 0) {
        $vetorPositivos[$cont_positivos] = $vetor[$i];
        $cont_positivos++;
    } else {
        $vetorNegativos[$cont_negativos] = $vetor[$i];
        $cont_negativos++;
    }
}

if ($cont_negativos === 0) {
    echo "Vetor de negativos vazios." . PHP_EOL;
} else {
    for ($i = 0; $i < $cont_negativos ; $i++) {
        echo $vetorNegativos[$i] . " | ";
    }
}

if ($cont_positivos === 0) {
    echo "Vetor de negativos vazios." . PHP_EOL;
} else {
    for ($i = 0; $i < $cont_positivos; $i++) {
        echo $vetorPositivos[$i] . " | ";
    }
}