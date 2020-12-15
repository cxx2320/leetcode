<?php
/*
 * @lc app=leetcode.cn id=216 lang=php
 *
 * [216] 组合总和 III
 */

// @lc code=start
class Solution
{

    public $res = [];

    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n)
    {
        if ($k >= $n) {
            return [];
        }
        $arr = [];
        $this->find($k, $n, 1, $arr);
        return $this->res;
    }

    function find($k, $n, $index, &$arr)
    {
        if ($k === 0 && $n === 0) {
            $this->res[] = $arr;
            return;
        }
        if ($k === 0 || $n <= 0) {
            return;
        }
        for ($i = $index; $i <= 9; $i++) {
            array_push($arr, $i);
            $this->find($k - 1, $n - $i, $i + 1, $arr);
            array_pop($arr);
        }
        return;
    }
}
// @lc code=end
