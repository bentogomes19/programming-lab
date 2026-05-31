<?php

$idadePessoas = [
    "Carlos" => 12,
    "Miguel" => 14,
    "Antony" => 23,
    "Suarez" => 33,
    "Hugo" => 42,
    "Bento" => 25
];


array_map(function ($nome, $idade) {
    echo "$nome tem $idade anos" . PHP_EOL;
}, array_keys($idadePessoas), $idadePessoas);