<?php
/*
 * @lc app=leetcode.cn id=74 lang=php
 *
 * [74] 搜索二维矩阵
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target)
    {
        $m_count = count($matrix);
        if ($m_count === 0) {
            return false;
        }
        if ($m_count === 1) {
            $nums = $matrix[0];
        } else {
            $x = $matrix[1] ?? [];
            $nums = [];
            if ($x[0] <= $target && $x[count($x) - 1] >= $target) {
                $nums = $x;
            } elseif ($x[0] > $target) {
                $nums = $matrix[0];
            } elseif ($x[count($x) - 1] < $target) {
                $nums = $matrix[2];
            }
        }


        $length = count($nums);
        [$left, $right] = [0, $length - 1];
        while ($left <= $right) {
            $m = $left + floor(($right - $left) / 2);
            if ($nums[$m] === $target) {
                return true;
            }
            if ($nums[$m] > $target) {
                $right = $m - 1;
            }
            if ($nums[$m] < $target) {
                $left = $m + 1;
            }
        }
        return false;
    }
}
// @lc code=end
