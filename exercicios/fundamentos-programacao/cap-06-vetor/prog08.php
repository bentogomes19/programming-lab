<?php

/**
 * 5. Uma escola deseja saber se existem alunos cursando, simultaneamente, as disciplinas Lógica e Linguagem de
 * Programação. Coloque os números das matrículas dos alunos que cursam Lógica em um vetor, quinze alunos.
 * Coloque os números das matrículas dos alunos que cursam Linguagem de Programação em outro vetor, dez
 * alunos. Mostre o número das matrículas que aparecem nos dois vetores.
 */

$matriculasLogica = [];
$matriculasLinguagemProgramacao = [];

echo "--- CADASTRO DE LÓGICA ---\n";
for ($i = 0; $i < 15; $i++) {
    $matriculasLogica[$i] = (int)(trim(readline("Lógica | Matrícula aluno " . ($i + 1) . ": ")));
}

echo "\n--- CADASTRO DE LINGUAGEM DE PROGRAMAÇÃO ---\n";
for ($j = 0; $j < 10; $j++) {
    $matriculasLinguagemProgramacao[$j] = (int)(trim(readline("Linguagem | Matrícula aluno " . ($j + 1) . ": ")));
}

echo "\n-----------------------------------------\n";
echo "Vetor Matriculados Lógica: [ " . implode(" ", $matriculasLogica) . " ]" . PHP_EOL;
echo "Vetor Matriculados Linguagem: [ " . implode(" ", $matriculasLinguagemProgramacao) . " ]" . PHP_EOL;

$simultaneos = array_intersect($matriculasLogica, $matriculasLinguagemProgramacao);

echo "\n--- ALUNOS CURSANDO AMBAS AS DISCIPLINAS ---\n";
if (empty($simultaneos)) {
    echo "Nenhum aluno está cursando ambas as disciplinas simultaneamente." . PHP_EOL;
} else {
    echo "Matrículas encontradas: [ " . implode(" ", $simultaneos) . " ]" . PHP_EOL;
}

