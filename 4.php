<?php
/**
 * 4. Напишите свой (без использования array_sum() и других встроенных функций работы с массивами)
 * самый быстрый метод, вычисляющий сумму значений массива
 * [2‚ 4‚ 6‚ 8‚ 10 … 100]
 */

/**
 * Я заметил, что последовательность чисел выражает арифметическую прогрессию
 */

$numbers = range(2, 100, 2);
$start = microtime(1);
$originSum = array_sum($numbers);
$end1 = microtime(1) - $start;

$n = count($numbers);
$q = 2;
$bn = end($numbers);
$b1 = reset($numbers);
$start = microtime(1);
$customSum = ($b1 + $bn) * $n / 2;

$end2 = microtime(1) - $start;

echo sprintf(
    'Оригинальная сумма: %s. Время: %s' . PHP_EOL .
    'Кастомная сумма: %s. Время: %s',
    $originSum,
    $end1,
    $customSum,
    $end2
);

echo PHP_EOL;

if ($end2 < $end1) {
    echo 'Второй способ быстрее первого';
} else {
    echo 'Первый способ быстрее второго';
}

/**
 * Если это не арифметическая прогрессия, то считать можно многими способами:
 */

$sum1 = array_reduce($numbers, static function ($carry, $number) {
    return $carry + $number;
});
$sum2 = 0;
for ($i = 0, $iMax = count($numbers); $i < $iMax; $i++) {
    $sum2 += $numbers[$i];
}
$sum3 = 0;
foreach ($numbers as $number) {
    $sum3 += $number;
}
echo PHP_EOL;

echo sprintf(
    'Sum1: %s' . PHP_EOL .
    'Sum2: %s' . PHP_EOL .
    'Sum3: %s' . PHP_EOL,
    $sum1,
    $sum2,
    $sum3
);