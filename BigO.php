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

// ----------------------------------------------------------
// Exponential Time - O(2^n)
// Traveling Salesman Problem (TSP) - Brute Force Approach

/**
 * Solve the Traveling Salesman Problem (TSP) using a brute force approach.
 *
 * @param array $distances A 2D array representing the distances between cities.
 * @return array An associative array containing the best path and the minimum path cost.
 */
function traveling_salesman($distances) {
    $num_cities = count($distances);
    $cities = range(0, $num_cities - 1);
    $min_path_cost = PHP_INT_MAX;
    $best_path = null;

    $permutations = permutations($cities);

    foreach ($permutations as $perm) {
        $current_cost = 0;
        for ($i = 0; $i < $num_cities - 1; $i++) {
            $current_cost += $distances[$perm[$i]][$perm[$i + 1]];
        }
        $current_cost += $distances[$perm[$num_cities - 1]][$perm[0]]; // Return to start city

        if ($current_cost < $min_path_cost) {
            $min_path_cost = $current_cost;
            $best_path = $perm;
        }
    }

    return ['best_path' => $best_path, 'min_path_cost' => $min_path_cost];
}

/**
 * Generate all permutations of an array.
 *
 * @param array $elements The array for which to generate permutations.
 * @return array An array of all permutations of the input array.
 */
function permutations($elements) {
    if (count($elements) <= 1) {
        return [$elements];
    }

    $result = [];
    foreach ($elements as $key => $element) {
        $remaining_elements = array_values(array_diff_key($elements, [$key => $element]));
        foreach (permutations($remaining_elements) as $permutation) {
            $result[] = array_merge([$element], $permutation);
        }
    }

    return $result;
}

// Example distance matrix (symmetric TSP)
$distances = [
    [0, 10, 15, 20],
    [10, 0, 35, 25],
    [15, 35, 0, 30],
    [20, 25, 30, 0]
];

$result = traveling_salesman($distances);
echo "Best path: " . implode(' -> ', $result['best_path']) . "\n";
echo "Minimum path cost: " . $result['min_path_cost'] . "\n";