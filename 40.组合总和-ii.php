<?php
/*
 * @lc app=leetcode.cn id=40 lang=php
 *
 * [40] 组合总和 II
 */

// @lc code=start
class Solution
{

    public $res = [];
    public $map = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target)
    {
        if (count($candidates) <= 0) {
            return [];
        }
        sort($candidates); // 排序
        $this->find($candidates, $target, [], 0);
        return $this->res;
    }

    function find(&$candidates, $target, $arr, $index)
    {
        if ($target === 0) {
            $this->res[] = $arr;
            return;
        }
        for ($i = $index; $i < count($candidates); $i++) {
            if ($candidates[$i] > $target) {
                continue;
            }
            if ($i > $index && $candidates[$i] === $candidates[$i - 1]) { // 数字不能重复使用判断
                continue;
            }
            array_push($arr, $candidates[$i]);
            $this->find($candidates, $target - $candidates[$i], $arr, $i + 1);
            array_pop($arr);
        }
        return;
    }
}
// @lc code=end
