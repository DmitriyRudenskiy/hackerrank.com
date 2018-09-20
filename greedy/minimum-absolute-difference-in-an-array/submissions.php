<?php

/**
 * @see https://www.hackerrank.com/challenges/minimum-absolute-difference-in-an-array
 */

// Complete the minimumAbsoluteDifference function below.
function minimumAbsoluteDifference($arr)
{
    // обязательно сортируем массив
    sort($arr);

    $size = sizeof($arr);

    // обрабатываем первый и последний элемент массива
    $min = min($arr[1] - $arr[0], $arr[$size - 1] - $arr[$size - 2]);

    // проходим массив
    for ($i = 1; $i < $size - 1; $i++) {
        $diff = min($arr[$i] - $arr[$i - 1], $arr[$i + 1] - $arr[$i]);

        if ($diff < $min) {
            $min = $diff;
        }
    }

    return $min;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = minimumAbsoluteDifference($arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);