<?php
/*
 * @lc app=leetcode.cn id=125 lang=php
 *
 * [125] 验证回文串
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        [$left, $right] = [0, strlen($s) - 1];
        while ($left < $right) {
            if (!ctype_alnum($s[$left])) {
                $left++;
                continue;
            }
            if (!ctype_alnum($s[$right])) {
                $right--;
                continue;
            }
            if (strtoupper($s[$left]) !== strtoupper($s[$right])) {
                return false;
            }
            $left++;
            $right--;
        }
        return true;
    }
}
// @lc code=end
