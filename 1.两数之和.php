<?php
/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];

        foreach ($nums as $i => $num) {
            $value = $target - $num;
            if(isset($map[$value])){
                return [$map[$value], $i];
            }
            $map[$num] = $i;
        }
        return [];
    }
}
// @lc code=end

