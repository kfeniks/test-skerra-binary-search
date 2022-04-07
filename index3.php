<?php
/**
 * @version 1.0.0
 * @access public
 */

declare(strict_types=1);

/**
 * Recursive binary search algorithm
 * @param array $arrayData
 * @param int $number
 * @param int $lowerPosition
 * @param int $highPosition
 * @return int
 */
function methodBinarySearchRecursion(array $arrayData, int $number, int $lowerPosition, int $highPosition): int
{
    /** Using the midpoint of the interval as a benchmark for comparison */
    $middle = intval(($lowerPosition + $highPosition) / 2);
    /** Exit if the lowest point is greater than the highest point */
    if ($lowerPosition > $highPosition) {
        return -1;
    }
    if ($number > $arrayData[$middle]) {
        /** The search number is greater than the checkpoint, discard the left one and continue the search */
        return methodBinarySearchRecursion($arrayData, $number, $middle + 1, $highPosition);
    } elseif ($number < $arrayData[$middle]) {
        /** The search number is less than the breakpoint, discard the right side to continue searching */
        return methodBinarySearchRecursion($arrayData, $number, $lowerPosition, $middle - 1);
    } else {
        return $middle;
    }
}

$arr = [4, 1, 452, 999, 11, 23, 63, 8743];
sort($arr);
$findKeyRecur = methodBinarySearchRecursion($arr, 63, 0, count($arr));
print_r($findKeyRecur);