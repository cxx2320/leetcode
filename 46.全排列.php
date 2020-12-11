<?php
/*
 * @lc app=leetcode.cn id=46 lang=php
 *
 * [46] 全排列
 */

// @lc code=start
class Solution
{

    /**
     * 记录已经用过的值
     *
     * @var array
     */
    public $used = [];

    public $res = [];
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        if (count($nums) < 1) {
            return $this->res;
        }
        $arr = [];
        $this->find($nums, 0, $arr);
        return $this->res;
    }

    function find($nums, $index, &$arr)
    {
        if ($index >= count($nums)) {
            $this->res[] = $arr;
            return;
        }
        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($this->used[$nums[$i]])) {
                $this->used[$nums[$i]] = true; // 记录当前值
                array_push($arr, $nums[$i]);
                $this->find($nums, $index + 1, $arr);
                unset($this->used[$nums[$i]]); // 当前值已经使用完毕，清除使用记录
                array_pop($arr);
            }
        }
        return;
    }
}
// @lc code=end
