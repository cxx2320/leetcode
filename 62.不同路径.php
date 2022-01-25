<?php
/*
 * @lc app=leetcode.cn id=62 lang=php
 *
 * [62] 不同路径
 */

// @lc code=start
class Solution
{

    /**
     * @param int $m
     * @param int $n
     * @return int
     */
    function uniquePaths($m, $n)
    {
        $grid = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $grid[$i][$j] = 1;
            }
        }
        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                $grid[$i][$j] = $grid[$i - 1][$j] + $grid[$i][$j - 1];
            }
        }
        return $grid[$m - 1][$n - 1];
    }
}
// @lc code=end

$s = new Solution();
$res = $s->uniquePaths(3, 2);
var_dump($res);
