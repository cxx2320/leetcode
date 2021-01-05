<?php
/*
 * @lc app=leetcode.cn id=875 lang=php
 *
 * [875] 爱吃香蕉的珂珂
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $piles
     * @param Integer $H
     * @return Integer
     */
    function minEatingSpeed($piles, $H)
    {
        // 根据题意可以知道最小速度和最大速度
        $right = max($piles);
        $left = 1;
        // 尝试在之间搜索符合题意的答案
        while ($left <= $right) {
            $mid = floor(($right + $left) / 2);
            if ($this->isDone($piles, $mid, $H)) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return $left;
    }

    /**
     * 以每小时$speed的速度能否在$H小时内吃完$piles
     *
     * @param array $piles
     * @param int $speed
     * @param int $H
     * @return boolean
     */
    private function isDone(&$piles, $speed, $H)
    {
        $time = 0;
        for ($i = 0; $i < count($piles); $i++) {
            $time += ceil($piles[$i] / $speed);
        }
        return $time <= $H;
    }
}
// @lc code=end
