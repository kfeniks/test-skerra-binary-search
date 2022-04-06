<?php
/**
 * @version 1.0.0
 * @access public
 */

declare(strict_types=1);

/**
 * Non-recursive binary search algorithm
 * @param array $arrayData
 * @param int $number
 * @return int
 */
function methodBinarySearch(array $arrayData, int $number): int
{
    if (empty($arrayData)) {
        return -1;
    }
    
    $arrayLength = count($arrayData);
    $lowerPosition = 0;
    $highPosition = $arrayLength - 1;
    
    /**
     * Exit if the lowest point is greater than the highest point
     */
    while ($lowerPosition <= $highPosition)
    {
        $middle = intval(($lowerPosition + $highPosition) / 2);
        if ($arrayData[$middle] > $number) {
            /**
             * The search number is less than the breakpoint and the right side is discarded
             */
            $highPosition = $middle - 1;
        } elseif ($arrayData[$middle] < $number) {
            /**
             * The search number is greater than the breakpoint and the left side is discarded
             */
            $lowerPosition = $middle + 1;
        } else {
            /**
             * The lookup number is equal to the breakpoint, then it is found and returned
             */
            return $middle;
        }
    }
    
    return -1;
}

$arr = [1, 2, 13, 9, 444, 57, 31, 790];
/** Find location 9 non-recursively */
$findKey = methodBinarySearch($arr, 9);
print_r($findKey);