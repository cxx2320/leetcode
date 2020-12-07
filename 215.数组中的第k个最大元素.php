<?php
/*
 * @lc app=leetcode.cn id=215 lang=php
 *
 * [215] 数组中的第K个最大元素
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k)
    {
        $heap = new SplMinHeap();
        foreach ($nums as $value) {
            if ($heap->count() < $k) {
                $heap->insert($value);
            } elseif ($value > $heap->top()) {
                $heap->extract();
                $heap->insert($value);
            }
        }
        return $heap->top();
    }
}
// @lc code=end
