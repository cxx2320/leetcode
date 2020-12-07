<?php
/*
 * @lc app=leetcode.cn id=35 lang=php
 *
 * [35] 搜索插入位置
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        $length = count($nums);
        if ($target > end($nums)) return $length;
        [$left, $right] = [0, $length - 1];
        while ($left < $right) {
            $m = $left + floor(($right - $left) / 2);
            if($nums[$m] === $target){
                return $m;
            }
            if($nums[$m] < $target){
                $left = $m + 1;
            }else{
                $right = $m;
            }
        }
        return $left;
    }
}
// @lc code=end
