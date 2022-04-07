<?php
/**
 * @version 2.0.0
 * @access public
 */

declare(strict_types=1);

/**
 * There is a known algorithm for finding an element in a sorted array called binary (binary) search.
 * Its essence lies in dividing the array into halves and comparing the desired element with the element
 * that is located in the middle of the newly obtained segment.
 *
 * Non-recursive binary search algorithm
 * @param array $arrayData
 * @param int $searchValue
 * @return bool|int
 */
function methodBinarySearch(array $arrayData, int $searchValue): bool|int
{
    $count = count($arrayData);
    /** Here we check the length of the array to protect against buffer overflows. */
    if($count < pow(2, 31)) {
        $start = 0;
        $end = $count - 1;
    
        while(true) {
            $len = $end - $start;
            if($len > 2) {
                if($len % 2 != 0) $len++;
                $mid = (int) ($len/2 + $start);
            } elseif ($len >= 0){
                $mid = $start;
            } else {
                return false;
            }
    
            if($arrayData[$mid] == $searchValue) {
                /**
                 * If in our original array the value we need occurs several times,
                 * then using this code we will get the first occurrence of the desired value in the array.
                 */
                while( ($mid != 0) && ($arrayData[$mid - 1] == $searchValue)) {
                    $mid--;
                }
    
                return $mid;
            } elseif($arrayData[$mid] > $searchValue){
                $end = $mid - 1;
            } else {
                $start = $mid + 1;
            }
        }
    } else {
        return false;
    }
}

$array = array(8,89,11,2,56,908,23);
sort($array);
$result = methodBinarySearch($array, 908);
if(false !== $result){
    var_dump("Result id:" . $result);
    var_dump("Result value:" . $array[$result]);
}