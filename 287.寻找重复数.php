<?php
/*
 * @lc app=leetcode.cn id=287 lang=php
 *
 * [287] 寻找重复数
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate($nums)
    {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            if(isset($map[$nums[$i]])){
                return $nums[$i];
            }
            $map[$nums[$i]] = $nums[$i];
        }
    }
}
// @lc code=end
