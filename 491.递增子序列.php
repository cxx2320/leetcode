<?php
/*
 * @lc app=leetcode.cn id=491 lang=php
 *
 * [491] 递增子序列
 */

// @lc code=start
class Solution
{
    public $res = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function findSubsequences($nums)
    {
        for ($i = 0; $i < count($nums); $i++) {
            $this->dfs($nums, $i + 1, [$nums[$i]], $nums[$i]);
        }
        return $this->res;
    }

    public function dfs($nums, $index, $arr, $pre_num)
    {
        if ($index >= count($nums)) {
            if (count($arr) >= 2) {
                $this->res[] = $arr;
            }
            return;
        }
        // 加了这一行判断，结果就正确了
        if ($nums[$index] != $pre_num) {
            $this->dfs($nums, $index + 1, $arr, $pre_num);
        }
        if ($nums[$index] >= $pre_num) {
            array_push($arr, $nums[$index]);
            $this->dfs($nums, $index + 1, $arr, $nums[$index]);
            array_pop($arr);
        }
    }
}
// @lc code=end
$s = new Solution();
$res = $s->findSubsequences([4, 6, 6]);
var_dump($res);
