<?php
/*
 * @lc app=leetcode.cn id=704 lang=php
 *
 * [704] 二分查找
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target)
    {
        $length = count($nums);
        $right = $length - 1;
        $left = 0;
        while ($left <= $right) {
            $m = $left + floor(($right - $left) / 2);
            if ($nums[$m] === $target) {
                return $m;
            }
            if ($nums[$m] < $target) {
                $left = $m + 1;
            }
            if ($nums[$m] > $target) {
                $right = $m - 1;
            }
            
        }
        return -1;
    }
}
// @lc code=end
