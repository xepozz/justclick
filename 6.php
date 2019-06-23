<?php

/**
 * 6. Дано: $number и $x, где $number - число, записанное в $x-ричной форме.
 * Посчитать сумму цифр $number максимально быстрым способом.
 */
function calc(string $nubmer, int $base)
{
    $decimalNumbers = prepareToDecimalNumbers($nubmer);

    return array_sum($decimalNumbers);
}

function prepareToDecimalNumbers(string $string)
{
    $uppedString = strtoupper($string);
    $chars = str_split($uppedString);
    $numbers = [];
    $firstOrder = ord('A');
    $lastOrder = ord('Z');
    foreach ($chars as $char) {
        $ord = ord($char);
        if ($ord >= $firstOrder && $ord <= $lastOrder) {
            $numbers[] = $ord - $firstOrder + 10;
        } else {
            $numbers[] = $char;
        }
    }

    return $numbers;

}

$numbers = [
    '11111' => 2, // 5
    '1234' => 8, // 10
    '0912' => 10, // 12
    'FFF' => 16, // 0
    '5F' => 16, // 0
];

foreach ($numbers as $number => $base) {
    echo sprintf(
             'Число "%s", СИ: "%s", Числа: "%s" Сумма цифр: %s',
             $number,
             $base,
             implode(', ', prepareToDecimalNumbers($number)),
             calc($number, $base)
         ) . PHP_EOL;
}