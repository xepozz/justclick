<?php

/**
 * 5. Есть текст с названиями городов через пробел и запятую.
 * Например: “Москва, Орёл, Ленинград, Оренбург, Нижний Новгород, Великий Новгород, Белгород, Орск”.
 * Переставьте названия городов так‚ чтобы они были упорядочены по алфавиту.
 */

/**
 * Основная проблема сравнения строк - спецсимволы конкретной локали.
 * В русском языке "ё" встает встает в конце таблицы.
 * Достаточно заменить "ё" на "е", чтобы стандартный алгоритм сравнения строк работал корректно.
 * Если требует сохранить "ё" в тексте, нужно немного модернизировать код, делаю сортировку по
 * "очищенному" массиву и потом связать ключами отсортированные данные.
 */
function clearCyrillic(array $replaces, string $replacement)
{
    foreach ($replaces as $what => $to) {
        $replacement = str_ireplace($what, $to, $replacement);
    }

    return $replacement;
}

$cities = 'Москва, Орёл, Ленинград, Оренбург, Нижний Новгород, Великий Новгород, Белгород, Орск';
$replaces = ['ё' => 'е'];
$cities = clearCyrillic($replaces, $cities);
$citiesArray = explode(', ', $cities);
sort($citiesArray);
echo implode(', ', $citiesArray);