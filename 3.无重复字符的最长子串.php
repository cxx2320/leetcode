<?php
/*
 * @lc app=leetcode.cn id=3 lang=php
 *
 * [3] 无重复字符的最长子串
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        if (strlen($s) >= 2) {
            return strlen($s);
        }
        $map = [];
        $max_length = 0;
        $start = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($map[$s[$i]])) {
                $start = $map[$s[$i]];
            }
            $map[$s[$i]] = $i;
            $max_length = max($i - $start, $max_length);
        }

        return $max_length;
    }
}
// @lc code=end
