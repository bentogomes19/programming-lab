<?php


$firstGrade  = (float)trim(readline("Primeira nota: "));
$secondGrade = (float)trim(readline("Segunda nota: "));
$thirdGrade  = (float)trim(readline("Terceira nota: "));

$average = ($firstGrade + $secondGrade + $thirdGrade) / 3;

if ($average >= 0 && $average < 3) {
    echo "Média final: " . $average . "-> Reprovado." . PHP_EOL;
} else if ($average >= 3 && $average < 7) {
    echo "Média final: " . $average . "-> Exame." . PHP_EOL;
} else if ($average >= 7 && $average <= 10) {
    echo "Média final: " . $average . "-> Aprovado." . PHP_EOL;
}
