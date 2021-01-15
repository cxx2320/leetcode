<?php
/*
 * @lc app=leetcode.cn id=47 lang=php
 *
 * [47] 全排列 II
 */

// @lc code=start
class Solution
{

    private $res = [];

    private $size = 0;

    private $used = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums)
    {
        // 一定要排序
        sort($nums);
        if (empty($nums)) {
            return [];
        }
        $this->size = count($nums);
        $array = [];
        $this->dfs($nums, $array, 0);
        return $this->res;
    }

    function dfs(&$nums, &$array)
    {
        if ($this->size === count($array)) {
            $this->res[] = $array;
            return;
        }
        // 上一个的值
        $pre = null;
        for ($i = 0; $i < $this->size; $i++) {
            if (isset($this->used[$i])) {
                continue;
            }
            if ($pre === $nums[$i]) {
                continue;
            }
            array_push($array, $nums[$i]);
            $this->used[$i] = true;
            $this->dfs($nums, $array);
            // 记录上一个值
            $pre = array_pop($array);
            unset($this->used[$i]);
        }
        return;
    }
}
// @lc code=end
