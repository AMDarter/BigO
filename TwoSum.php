<?php

function twoSumNested($nums, $target) {
    for ($i = 0; $i < count($nums); $i++) {
        for ($j = $i + 1; $j < count($nums); $j++) {
            if ($nums[$i] + $nums[$j] == $target) {
                return [$i, $j];
            }
        }
    }
    return [];
}

function twoSumHashMap($nums, $target) {
    $map = []; // Initialize an empty hash map

    for ($i = 0; $i < count($nums); $i++) {
        $complement = $target - $nums[$i];

        if (array_key_exists($complement, $map)) {
            return [$map[$complement], $i];
        }

        $map[$nums[$i]] = $i;
    }

    return [];
}

$nums_small = range(1, 100);
$target_small = 49;

// Measure time for nested loop approach with small array
$start_time = microtime(true);
$result_nested_small = twoSumNested($nums_small, $target_small);
$end_time = microtime(true);
$time_nested_small = $end_time - $start_time;

// Measure time for hash map approach with small array
$start_time = microtime(true);
$result_hashmap_small = twoSumHashMap($nums_small, $target_small);
$end_time = microtime(true);
$time_hashmap_small = $end_time - $start_time;

echo "Small Array Results:\n";
echo "Nested Loop Result: ";
print_r($result_nested_small);
echo "Time Taken (Nested Loop): " . $time_nested_small . " seconds\n";

echo "Hash Map Result: ";
print_r($result_hashmap_small);
echo "Time Taken (Hash Map): " . $time_hashmap_small . " seconds\n";


// Generate a larger array for testing
$nums_large = range(1, 1000000);
$nums_large[999998] = 500000; // Adjusting some values to ensure a solution
$nums_large[999999] = 500002;
$target_large = 1000002;

// Measure time for nested loop approach with large array
$start_time = microtime(true);
$result_nested_large = twoSumNested($nums_large, $target_large);
$end_time = microtime(true);
$time_nested_large = $end_time - $start_time;

// Measure time for hash map approach with large array
$start_time = microtime(true);
$result_hashmap_large = twoSumHashMap($nums_large, $target_large);
$end_time = microtime(true);
$time_hashmap_large = $end_time - $start_time;

echo "\nLarge Array Results:\n";
echo "Nested Loop Result: ";
print_r($result_nested_large);
echo "Time Taken (Nested Loop): " . $time_nested_large . " seconds\n";

echo "Hash Map Result: ";
print_r($result_hashmap_large);
echo "Time Taken (Hash Map): " . $time_hashmap_large . " seconds\n";



// Results:

// Small Array Results:
// Nested Loop Result: Array
// (
//     [0] => 0
//     [1] => 47
// )
// Time Taken (Nested Loop): 9.0599060058594E-6 seconds
// Hash Map Result: Array
// (
//     [0] => 23
//     [1] => 24
// )
// Time Taken (Hash Map): 1.0967254638672E-5 seconds

// Large Array Results:
// Nested Loop Result: Array
// (
//     [0] => 3
//     [1] => 999997
// )
// Time Taken (Nested Loop): 0.10515999794006 seconds
// Hash Map Result: Array
// (
//     [0] => 499999
//     [1] => 500001
// )
// Time Taken (Hash Map): 0.037472009658813 seconds