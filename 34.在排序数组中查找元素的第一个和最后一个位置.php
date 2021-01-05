<?php
/*
 * @lc app=leetcode.cn id=34 lang=php
 *
 * [34] 在排序数组中查找元素的第一个和最后一个位置
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        if (empty($nums)) {
            return [-1, -1];
        }
        $left = $this->find($nums, $target, true);
        // 如果左边界未找到，有边界也不会存在
        $right = $left === -1 ? -1 : $this->find($nums, $target, false);
        return [$left, $right];
    }

    /**
     * 二分边界查找
     *
     * @param array $nums
     * @param num $target
     * @param boolean $is_left 查找左还是右
     * @return int
     */
    public function find(&$nums, $target, $is_left = true)
    {
        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            $mid = floor(($left + $right) / 2);
            if ($nums[$mid] === $target) {
                if ($is_left) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            } elseif ($nums[$mid] > $target) {
                $right = $mid - 1;
            }
        }
        if ($is_left) {
            return $nums[$left] === $target ? $left : -1;
        } else {
            return $nums[$right] === $target ? $right : -1;
        }
    }
}
// @lc code=end
