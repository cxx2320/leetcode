<?php
/*
 * @lc app=leetcode.cn id=90 lang=php
 *
 * [90] 子集 II
 */

// @lc code=start
class Solution
{
    private $res = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums)
    {
        sort($nums); // 必须要排序保证重复的值在一块
        $this->find($nums, count($nums), 0, []);
        return $this->res;
    }

    function find($nums, $length, $index, $arr)
    {
        // 这个问题和之前遇到的组合问题有点不同的是，组合问题存储解的时候时在index===length的情况
        // 这个问题需要每次进入都要存储一下arr
        $this->res[] = $arr;
        for ($i = $index; $i < $length; $i++) {
            if ($i > $index && $nums[$i] === $nums[$i - 1]) { // 和上一个相同
                continue;
            }
            array_push($arr, $nums[$i]);
            $this->find($nums, $length, $i + 1, $arr);
            array_pop($arr);
        }
    }
}
// @lc code=end
