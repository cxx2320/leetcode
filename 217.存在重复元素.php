<?php
/*
 * @lc app=leetcode.cn id=217 lang=php
 *
 * [217] 存在重复元素
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $map = [];
        foreach ($nums as $num) {
            if(isset($map[$num])){
                return true;
            }else{
                $map[$num] = 0;
            }
        }
        return false;
    }
}
// @lc code=end

