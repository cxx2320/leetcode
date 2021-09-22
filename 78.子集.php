<?php
/*
 * @lc app=leetcode.cn id=78 lang=php
 *
 * [78] 子集
 */

// @lc code=start
class Solution1
{

    private $res = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        $length = count($nums);
        $this->dfs($nums, $length, 0, []);
        return $this->res;
    }

    function dfs($nums, $length, $index, $arr)
    {
        if ($length === $index) { // 结束条件（当index累加到了length时，把当前结果存储起来）
            $this->res[] = $arr;
            return;
        }
        $this->dfs($nums, $length, $index + 1, $arr); // 不选当前$nums[$index]值
        array_push($arr, $nums[$index]);
        $this->dfs($nums, $length, $index + 1, $arr); // 选择当前$nums[$index]值
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        $res = [[]];
        for ($i = 0; $i < count($nums); $i++) {
            // 这里必须重新计算数目
            $count = count($res);
            for ($j = 0; $j < $count; $j++) {
                $res[] = array_merge($res[$j], $nums[$i]);
            }
        }
        return $res;
    }
}
// @lc code=end

$s = new Solution();
var_dump($s->subsets([1, 2, 3]));
