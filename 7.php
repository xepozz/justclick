<?php

/**
 * 7. Проверить корректность расстановки круглых скобок - только символы “(“ и “)” - в строке.
 * Между скобками допустимы любые символы.
 * Валидной считается строка, где все скобки правильно открыты и закрыты.
 */

$samples = [
    '()(s))', // invalid
    '(ok)', // valid
    '(ok()', // invalid
    '(o(k))() ((((()))))', // valid
    'empty string', // valid
    '', // valid
];

function check($str)
{
    $chars = str_split($str);
    $isValid = false;
    $openedBracketFound = 0;

    foreach ($chars as $i => $char) {
        if ($char === '(') {
            $openedBracketFound++;
        } elseif ($char === ')') {
            if ($openedBracketFound > 0) {
                $openedBracketFound--;
            } else {
                $isValid = false;
                break;
            }
        }
        $isValid = $openedBracketFound <= 0;
    }

    return $isValid;
}

$results = array_combine($samples, array_map('check', $samples));
foreach ($results as $str => $isValid) {
    echo sprintf(
             'Строка: "%s". Результат: %s',
             $str,
             $isValid ? 'валидна' : 'невалидна'
         ) . PHP_EOL;
}