<?php

/**
 * @see https://www.hackerrank.com/challenges/pairs
 */

// Complete the pairs function below.
function pairs($k, $arr)
{
    // делаем для экономиии сравнений
    sort($arr);

    $size = sizeof($arr);
    $result = 0;

    for ($i = 0; $i < $size; $i++) {
        // ? - $arr[$i] = $k
        $paris = $arr[$i] + $k;

        // не может быть парой самому себе
        $j = $i + 1;

        // ищем индекс второго элемента пары
        while (isset($arr[$j]) && $paris >= $arr[$j]) {
            $j++;
        }

        if ($paris === $arr[$j - 1]) {
            $result++;
        }
    }

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = pairs($k, $arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);