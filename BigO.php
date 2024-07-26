<?php
// ----------------------------------------------------------
// Constant Time - O(1)

/**
 * Get the element at a specified index in an array.
 *
 * @param array $arr The array from which to retrieve the element.
 * @param int $index The index of the element to retrieve.
 * @return mixed The element at the specified index.
 */
function getElement($arr, $index) {
    return $arr[$index];
}

$arr = [1, 2, 3, 4, 5];
echo "O(1) Example: " . getElement($arr, 2) . "\n"; // Outputs 3

// ----------------------------------------------------------
// Linear Time - O(n)

/**
 * Perform a linear search on an array.
 *
 * @param array $arr The array to search.
 * @param mixed $target The target value to search for.
 * @return int The index of the target value if found, or -1 if not found.
 */
function linearSearch($arr, $target) {
    foreach ($arr as $index => $value) {
        if ($value == $target) {
            return $index;
        }
    }
    return -1;
}

$arr = [1, 2, 3, 4, 5];
echo "O(n) Example: " . linearSearch($arr, 3) . "\n"; // Outputs 2

// ----------------------------------------------------------
// Quadratic Time - O(n^2)

/**
 * Sort an array using the bubble sort algorithm.
 *
 * @param array &$arr The array to be sorted. The array is passed by reference.
 * @return void
 */
function bubbleSort(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}

$arr = [5, 3, 8, 4, 2];
bubbleSort($arr);
echo "O(n^2) Example: ";
print_r($arr); // Outputs [2, 3, 4, 5, 8]

// ----------------------------------------------------------
// Logarithmic Time - O(log n)

/**
 * Perform a binary search on a sorted array.
 *
 * @param array $arr The sorted array to search.
 * @param mixed $target The target value to search for.
 * @return int The index of the target value if found, or -1 if not found.
 */
function binarySearch($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;
    
    while ($left <= $right) {
        $mid = intdiv($left + $right, 2);
        if ($arr[$mid] == $target) {
            return $mid;
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    return -1;
}

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo "O(log n) Example: " . binarySearch($arr, 4) . "\n"; // Outputs 3

// ----------------------------------------------------------
// Linearithmic Time - O(n log n)

/**
 * Sort an array using the merge sort algorithm.
 *
 * @param array $arr The array to be sorted.
 * @return array The sorted array.
 */
function mergeSort($arr) {
    if (count($arr) <= 1) {
        return $arr;
    }
    
    $mid = intdiv(count($arr), 2);
    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));
    
    return merge($left, $right);
}

/**
 * Merge two sorted arrays.
 *
 * @param array $left The left sorted array.
 * @param array $right The right sorted array.
 * @return array The merged and sorted array.
 */
function merge($left, $right) {
    $result = [];
    $i = $j = 0;
    
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }
    
    while ($i < count($left)) {
        $result[] = $left[$i];
        $i++;
    }
    
    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }
    
    return $result;
}

$arr = [5, 3, 8, 4, 2, 7, 1, 6];
$arr = mergeSort($arr);
echo "O(n log n) Example: ";
print_r($arr); // Outputs [1, 2, 3, 4, 5, 6, 7, 8]

