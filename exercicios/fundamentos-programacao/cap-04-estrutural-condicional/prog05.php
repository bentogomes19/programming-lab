<?php

/* Código do produto e a quantidade */
$productCode = (int)(trim(readline("Código do Produto: ")));
$quantity    = (int)(trim(readline("Quantidade: ")));

$priceUnit  = unitPriceTableOne($productCode);
$totalPrice = $priceUnit * $quantity;
$discount   = calculateDiscountTableTwo($totalPrice);

$finalPrice = $totalPrice - $discount;

echo "Preço Unitário:      R$ " . $priceUnit . PHP_EOL;
echo "Preço Total da Nota: R$ " . $totalPrice . PHP_EOL;
echo "Desconto:            R$ " . $discount . PHP_EOL;
echo "Preço Final:         R$ " . $finalPrice . PHP_EOL;


/**
 * Retorna o valor do preço unitário do produto comprado, Tabela 1
 *
 * @param int $productCode
 *
 * @return float
 */
function unitPriceTableOne(int $productCode): float {
    if ($productCode >= 1 && $productCode <= 10) {
        return 10.0;
    } else if ($productCode >= 11 && $productCode <= 20) {
        return 15.00;
    } else if ($productCode >= 21 && $productCode <= 30) {
        return 20.00;
    } else if ($productCode >= 31 && $productCode <= 40) {
        return 30.00;
    }

    return 0.0;
}

/**
 * Calcula o desconto seguindo a tabela II
 *
 * @param  float $totalPrice
 *
 * @return float
 */
function calculateDiscountTableTwo(float $totalPrice): float {
    if ($totalPrice > 500) {
        return $totalPrice * 0.15;
    } else if ($totalPrice >= 250 && $totalPrice <= 500) {
        return $totalPrice * 0.10;
    } else if ($totalPrice < 250) {
        return $totalPrice * 0.05;
    }

    return 0.0;
}


