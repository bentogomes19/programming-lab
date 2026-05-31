<?php

/* Array de Arrays */
$alunos = [
    [
        "nome" => "Carlos",
        "curso" => "ADS",
        "notas" => [8, 7, 9]
    ],
    [
        "nome" => "Miguel",
        "curso" => "ADS",
        "notas" => [5, 6, 4]
    ],
    [
        "nome" => "Bento",
        "curso" => "Sistemas para Internet",
        "notas" => [9, 8, 10]
    ],
    [
        "nome" => "Hugo",
        "curso" => "Logística",
        "notas" => [6, 6, 7]
    ],
    [
        "nome" => "Maria",
        "curso" => "Segurança da Informação",
        "notas" => [7,8,9]
    ]
];


/* foreach -> É usado para percorrer o array */
foreach ($alunos as $aluno) {
    echo $aluno["nome"] . ' - ' . $aluno["curso"] . PHP_EOL;
}

/* array_map -> usado para transformar uma lista em uma outra lista */
$frases = array_map(function ($aluno) {
    return $aluno["nome"] . " faz " . $aluno["curso"];
}, $alunos);

print_r($frases);

/*arrow_function é uma função curta*/

$frases = array_map(fn($aluno) => $aluno["nome"] . " faz " . $aluno["curso"], $alunos);


/* array_filter -> Filtrar alunos de maior idade */
$maiorIdade = array_filter($alunos, function ($aluno) {
   return $aluno["notas"] <= 7;
});

print_r($maiorIdade);