<?php

namespace App\Services;

class BubbleSort
{
    /**
     * Bubble Sort Algorithm implementation.
     * This method sorts an array of numbers in ascending order (lowest to highest).
     *
     * @param  array<int|float>  $array  The array to be sorted.
     * @return array<int|float> The sorted array.
     */
    public function bubbleSort(array $array): array
    {
        $n = count($array);

        // Main loop for the number of passes
        for ($i = 0; $i < $n - 1; $i++) {
            // Inner loop for comparisons and swaps
            for ($j = 0; $j < $n - $i - 1; $j++) {
                // If the current element is greater than the next, swap them
                if ($array[$j] < $array[$j + 1]) {
                    // Swap operation
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }

        return $array;
    }
}
