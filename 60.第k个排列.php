<?php
/*
 * @lc app=leetcode.cn id=60 lang=php
 *
 * [60] 第k个排列
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getPermutation($n, $k)
    {
        $result = [];
        $list = range(1, $n);
        for ($i = 0; $i < $n; $i++) {
            $tmp = $this->test($list, $i);
            $result = array_merge($result, $tmp);
        }
        return $result[$k];
    }

    function test($list, $i)
    {
    }
}
// @lc code=end
