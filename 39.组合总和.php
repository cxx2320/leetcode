<?php
/*
 * @lc app=leetcode.cn id=39 lang=php
 *
 * [39] 组合总和
 */

// @lc code=start
class Solution
{

    public $res = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target)
    {
        if (count($candidates) <= 0) {
            return [];
        }
        $arr = [];
        $this->find($candidates, $target, $arr, 0);
        return $this->res;
    }

    function find(&$candidates, $target, &$arr, $index)
    {
        if ($target === 0) {
            $this->res[] = $arr;
            return;
        }
        for ($i = $index; $i < count($candidates); $i++) {
            if ($candidates[$i] > $target) {
                continue;
            }
            array_push($arr, $candidates[$i]);
            $this->find($candidates, $target - $candidates[$i], $arr, $i);
            array_pop($arr);
        }
        return;
    }
}
// @lc code=end
