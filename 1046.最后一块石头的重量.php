<?php

/*
 * @lc app=leetcode.cn id=1046 lang=php
 *
 * [1046] 最后一块石头的重量
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones)
    {
        $heap = new SplMaxHeap();
        foreach ($stones as $value) {
            $heap->insert($value);
        }
        while ($heap->count() > 1) {
            $value1 = $heap->extract();
            $value2 = $heap->extract();
            $tmp = $value1 - $value2;
            if ($tmp > 0) {
                $heap->insert($tmp);
            }
        }
        return  $heap->isEmpty() ? 0 : $heap->top();
    }
}
// @lc code=end
