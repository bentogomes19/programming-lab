<?php


$firstGrade = (float)trim(readline("Digite a primeira nota: "));
$secondGrade = (float)trim(readline("Digite a segunda nota: "));
$thirdGrade = (float)trim(readline("Digite a terceira nota: "));

$average = (($firstGrade * 2) + ($secondGrade * 3) + ($thirdGrade * 5)) / 10;

if ($average >= 8 && $average <= 10) {
    echo "Média Ponderada: " . $average . "-> Conceito A";
} else if ($average >= 7 && $average < 8) {
    echo "Média Ponderada: " . $average . "-> Conceito B";
} else if ($average >= 6 && $average < 7) {
    echo "Média Ponderada: " . $average . "-> Conceito C";
} else if ($average >= 5 && $average < 6) {
    echo "Média Ponderada: " . $average . "-> Conceito D";
} else if ($average >= 0 && $average < 5) {
    echo "Média Ponderada: " . $average . "-> Conceito E";
}