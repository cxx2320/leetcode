<?php
/*
 * @lc app=leetcode.cn id=48 lang=php
 *
 * [48] 旋转图像
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix)
    {
        $count = count($matrix);
        $c  = $count - 1;
        // 这里并没有循环全部
        for ($x = 0; $x < floor($count / 2); $x++) {
            // 这里也是没有循环全部
            for ($y = $x; $y < $count - $x - 1; $y++) {
                [
                    $matrix[$x][$y],
                    $matrix[($c - $y)][$x],
                    $matrix[($c - $x)][($c - $y)],
                    $matrix[$y][$c - $x],
                ] = [
                    $matrix[($c - $y)][$x],
                    $matrix[($c - $x)][($c - $y)],
                    $matrix[$y][$c - $x],
                    $matrix[$x][$y],
                ];
            }
        }

        // 前一个坐标的值放到下一个坐标位置
        // 00 -> 03 -> 33 -> 30 -> 00
        // 01 -> 13 -> 32 -> 20 -> 01
        // 02 -> 23 -> 31 -> 10 -> 02
        // 11 -> 12 -> 22 -> 21 -> 11
    }
}
// @lc code=end

$matrix = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
$s = new Solution();
$s->rotate($matrix);
var_dump($matrix);
