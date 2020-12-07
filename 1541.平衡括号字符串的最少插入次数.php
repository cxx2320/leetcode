<?php
/*
 * @lc app=leetcode.cn id=1541 lang=php
 *
 * [1541] 平衡括号字符串的最少插入次数
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function minInsertions($s)
    {
        $length = strlen($s);
        $left = 0;
        $right = 0;
        for ($i = 0; $i < $length; $i++) {
            if ($s[$i] === '(') {
                $left++;
            }
            if ($s[$i] === ')') {
                $right++;
            }
        }
        if ($left === 0) {
            return ceil($right / 2);
        }
        if ($right === 0) {
            return $left * 2;
        }
        return ($right + $left) - $length;
    }
}
// @lc code=end
