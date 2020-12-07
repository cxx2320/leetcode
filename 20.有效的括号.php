<?php
/*
 * @lc app=leetcode.cn id=20 lang=php
 *
 * [20] 有效的括号
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        if (empty($s)) {
            return false;
        }
        if (strlen($s) % 2) {
            return false;
        }
        $k = [
            '(' => ')',
            '{' => '}',
            '[' => ']',
        ];
        $stack = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($k[$s[$i]])) {
                array_push($stack, $s[$i]);
                continue;
            }
            if (empty($stack)) {
                return false;
            }
            if (!empty($stack)) {
                $left = $k[array_pop($stack)];
                $right = $s[$i];
                if ($left === $right) {
                    continue;
                }
                return false;
            }
        }
        return empty($stack);
    }
}
// @lc code=end
