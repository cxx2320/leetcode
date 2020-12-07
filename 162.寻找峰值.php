<?php
/*
 * @lc app=leetcode.cn id=162 lang=php
 *
 * [162] 寻找峰值
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums)
    {
        $count = count($nums);
        if ($count < 2) {
            return 0;
        }
        if ($count === 2) {
            return $nums[0] > $nums[1] ? 0 : 1;
        }
        for ($i = 1; $i < $count; $i++) {
            $left = $nums[$i - 1];
            $right = $nums[$i + 1] ?? 0;
            if ($nums[$i] > $left && $nums[$i] > $right) {
                return $i;
            }
        }
        return 0;
    }
}
// @lc code=end
