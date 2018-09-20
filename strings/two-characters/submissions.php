<?php

/**
 * @see https://www.hackerrank.com/challenges/two-characters
 */

function getPositionSequenceLength($firstChar, $secondChar, $string)
{
    $length = 0;
    $size = strlen($string);

    for ($i = 0; $i < $size; $i++) {
        // повторение
        if ($string[$i] === $secondChar) {
            return 0;
        }

        if ($string[$i] === $firstChar) {
            $length++;
            $firstChar = $secondChar;
            $secondChar = $string[$i];
        }
    }

    return $length;
}

// Complete the alternate function below.
function alternate($s)
{
    $length = strlen($s);

    // пустая строка
    if ($length === 0) {
        return 0;
    }

    $result = [0];
    $position = 0;

    while ($position < $length) {
        // первый и второй символ строки равны
        if ($s[0] === $s[1]) {
            $clearString = '';
            $size = strlen($arr);

            for ($i = 0; $i < $size; $i++) {
                if ($s[0] !== $s[$i]) {
                    $clearString[] = $s[$i];
                }
            }

            return alternate($clearString);
        }

        if ($s[$position] !== $s[1]) {
            for ($i = strpos($s, $s[$position]); $i < $length; $i++) {
                // символы равны
                if ($s[$position] === $s[$i]) {
                    $result[] = 0;
                } else {
                    $result[] = getPositionSequenceLength($s[$position], $s[$i], $s);
                }
            }
        }
        $position++;
    }

    // самая длинная строка
    return max($result);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$l = intval(trim(fgets(STDIN)));

$s = rtrim(fgets(STDIN), "\r\n");

$result = alternate($s);

fwrite($fptr, $result . "\n");

fclose($fptr);