<?php
/*
 * @lc app=leetcode.cn id=344 lang=php
 *
 * [344] 反转字符串
 */

// @lc code=start
class Solution
{

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s)
    {
        $j = count($s) - 1;
        for ($i = 0; $i < floor(count($s) / 2); $i++) {
            [$s[$i], $s[$j]] = [$s[$j], $s[$i]];
            $j--;
        }
    }
}
// @lc code=end