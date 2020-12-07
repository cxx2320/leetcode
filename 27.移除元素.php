<?php
/*
 * @lc app=leetcode.cn id=27 lang=php
 *
 * [27] 移除元素
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val)
    {
        // 双指针
        $j = 0;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] !== $val) {
                $nums[$j] = $nums[$i];
                $j++;
            }
        }
        return $j;
    }
}
// @lc code=end
