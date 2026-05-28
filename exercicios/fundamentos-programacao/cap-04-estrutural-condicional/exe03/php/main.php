<?php

$numberOne = (float)(trim(readline("Numero 1: ")));
$numberTwo = (float)(trim(readline("Numero 2: ")));

if ($numberOne > $numberTwo) {
    echo "O número " . $numberOne . " é maior que o " . $numberTwo . PHP_EOL;
} else {
    echo "O número " . $numberTwo . " é maior que o " . $numberOne . PHP_EOL;
}