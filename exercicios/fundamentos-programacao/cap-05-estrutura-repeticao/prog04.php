<?php

/**
 * Enunciado...
 */


$codigo = (int)(trim(readline("Código | 99999 para encerrar o programa: ")));
$somaSalarioLiquidoMasculino = 0;
$somaSalarioLiquidoFeminino  = 0;
$countMasculino = 0;
$countFeminino = 0;

while ($codigo != 99999) {
    $sexo = (trim(readline("Sexo (M - Masculino | F - Feminino): ")));
    $horasAula = (int)(trim(readline("Número de horas/aula mensal: ")));

    $salarioBruto = $horasAula * 30;

    /* Calcula o salário líquido com base no sexo */
    if ($sexo === "M" || $sexo === "m") {
        $salarioLiquido = $salarioBruto - ($salarioBruto * 0.10);
        $somaSalarioLiquidoMasculino += $salarioLiquido;
        $countMasculino++;
    } else if ($sexo === "F" || $sexo === "f") {
        $salarioLiquido = $salarioBruto - ($salarioBruto * 0.05);
        $somaSalarioLiquidoFeminino += $salarioLiquido;
        $countFeminino++;
    } else {
        echo "Sexo inválido... Tente novamente." . PHP_EOL;

        $codigo = (int)(trim(readline("Código | 99999 para encerrar o programa: ")));
    }


    $mediaMasculino = !empty($countMasculino) ? $somaSalarioLiquidoMasculino / $countMasculino : 0;
    $mediaFeminino  = !empty($countFeminino) ? $somaSalarioLiquidoFeminino / $countFeminino : 0;

    /*Mostrando o código, salário bruto e salário líquido*/
    echo "Código: " . $codigo . PHP_EOL;
    echo "Salário Bruto: R$ " . number_format($salarioBruto, 2, ',', '.') . PHP_EOL;
    echo "Salário Líquido: R$ " . number_format($salarioLiquido, 2, ',', '.') . PHP_EOL;
    echo "-----------------------------------------------------------" . PHP_EOL;
    echo "Média dos salários professores (Masculino): " . $mediaMasculino . PHP_EOL;
    echo "Média dos salários professores (Feminino): " . $mediaFeminino . PHP_EOL;

    $codigo = (int)(trim(readline("Código | 99999 para encerrar o programa: ")));

}

readline("Encerrando programa...");



