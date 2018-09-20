<?php
/**
 * @see https://www.hackerrank.com/challenges/circular-array-rotation
 */

// Complete the circularArrayRotation function below.
function circularArrayRotation($a, $k, $queries)
{
    $sizeInput = sizeof($a);

    // сдвиг равен количеству изменений - массив остался неизменным
    if ($sizeInput == $k) {
        $k = 0;
    }

    // при сдвиге на большее количество элементов чем размер массива
    if ($k > $sizeInput) {
        $k %= $sizeInput;
    }

    $result = [];

    $size = sizeof($queries);

    for ($j = 0; $j < $size; $j++) {
        // новый индекс с учётом сдвига
        $index = $queries[$j] - $k;

        if ($index < 0) {
            // сдвиг начало
            $index += $sizeInput;
        }

        $result[] = $a[$index];
    }

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nkq_temp);
$nkq = explode(' ', $nkq_temp);

$n = intval($nkq[0]);

$k = intval($nkq[1]);

$q = intval($nkq[2]);

fscanf($stdin, "%[^\n]", $a_temp);

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$queries = array();

for ($i = 0; $i < $q; $i++) {
    fscanf($stdin, "%d\n", $queries_item);
    $queries[] = $queries_item;
}

$result = circularArrayRotation($a, $k, $queries);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($stdin);
fclose($fptr);