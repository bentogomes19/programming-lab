<?php

$ingressoQuantidade = 120;
$despesas = 200.0;

echo '--------------------------------' . PHP_EOL;
echo "PREÇO INGRESSO  | LUCRO    |" . PHP_EOL;
for ($precoIngresso = 5; $precoIngresso >= 0.50; $precoIngresso = $precoIngresso - 0.5) {
    echo "R$ " . $precoIngresso . " --- R$ " . (($precoIngresso * 120) - $despesas) . PHP_EOL;

}
