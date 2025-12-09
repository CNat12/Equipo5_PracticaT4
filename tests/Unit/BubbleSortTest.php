<?php

namespace Tests\Unit;

use App\Services\BubbleSort;
use PHPUnit\Framework\TestCase;

class BubbleSortTest extends TestCase
{
    /** @var BubbleSort */
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new BubbleSort;
    }

    /**
     * Test that the Bubble Sort algorithm correctly orders positive integers.
     *
     * @return void
     */
    public function test_bubble_sort_orders_positive_integers_correctly()
    {
        $input = [5, 1, 4, 2, 8];
        $expected = [1, 2, 4, 5, 8];
        $this->assertIsArray($input);
        $this->assertEquals($expected, $this->service->bubbleSort($input));
    }

    /**
     * Test that the algorithm handles an array that is already sorted.
     *
     * @return void
     */
    public function test_bubble_sort_handles_already_sorted_array()
    {
        $input = [10, 20, 30, 40];
        $expected = [10, 20, 30, 40];
        $this->assertEquals($expected, $this->service->bubbleSort($input));
    }

    /**
     * Test that the algorithm handles an array sorted in reverse order.
     *
     * @return void
     */
    public function test_bubble_sort_handles_reverse_sorted_array()
    {
        $input = [5, 4, 3, 2, 1];
        $expected = [1, 2, 3, 4, 5];
        $this->assertEquals($expected, $this->service->bubbleSort($input));
    }

    /**
     * Test that the algorithm handles arrays containing duplicate numbers.
     *
     * @return void
     */
    public function test_bubble_sort_handles_array_with_duplicates()
    {
        $input = [3, 1, 4, 1, 5, 9, 2, 6];
        $expected = [1, 1, 2, 3, 4, 5, 6, 9];
        $this->assertEquals($expected, $this->service->bubbleSort($input));
    }
}
