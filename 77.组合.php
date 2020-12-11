<?php
/*
 * @lc app=leetcode.cn id=77 lang=php
 *
 * [77] 组合
 */

// @lc code=start
class Solution
{

    public $res = [];

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k)
    {
        if ($n < 1 || $k > $n || $k < 1) {
            return [];
        }
        $arr = [];
        $this->find($n, $k, 1, $arr);
        return $this->res;
    }

    function find($n, $k, $start, &$arr)
    {
        if ($k === count($arr)) {
            $this->res[] = $arr;
            return;
        }
        // 这里把 $i <= $n 换成 $n - ($k - count($arr)) + 1
        for ($i = $start; $i <= $n - ($k - count($arr)) + 1; $i++) {
            array_push($arr, $i);
            $this->find($n, $k, $i + 1, $arr);
            array_pop($arr);
        }
        return;
    }
}
// @lc code=end
