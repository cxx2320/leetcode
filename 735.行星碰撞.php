<?php
/*
 * @lc app=leetcode.cn id=735 lang=php
 *
 * [735] 行星碰撞
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    function asteroidCollision($asteroids)
    {
        $length = count($asteroids);
        if ($length === 0) {
            return [];
        }
        if ($length === 1) {
            return $asteroids;
        }
        $stack = [];
        array_push($stack, $asteroids[0]);
        for ($i = 1; $i < $length; $i++) {
            $left_star = array_pop($stack) ?? 0;
            $right_star = $asteroids[$i];
            while ($left_star > 0 && $right_star < 0) { // 发送碰撞
                if (abs($right_star) > $left_star) { // 右星大，继续取出左星
                    $left_star = array_pop($stack) ?? 0;
                } elseif (abs($right_star) < $left_star) { // 右星小，右星碰撞消失归零
                    $right_star = 0;
                } else { // 左右星一致，双星归零
                    $right_star = 0;
                    $left_star = 0;
                }
            }
            if ($left_star !== 0) {
                array_push($stack, $left_star);
            }
            if ($right_star !== 0) {
                array_push($stack, $right_star);
            }
        }
        return $stack;
    }
}
// @lc code=end
