<?php
/*
 * @lc app=leetcode.cn id=55 lang=php
 *
 * [55] 跳跃游戏
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $nums
     * @return Boolean
     */
    function canJump($nums)
    {
        $len = count($nums);
        if ($nums[0] === 0 && $len === 1) {
            return true;
        }
        if ($nums[0] === 0 && $len > 1) {
            return false;
        }
        for ($i = 0; $i < $len - 1; $i++) {
            if ($nums[$i] === 0) {
                for ($j = ($i - 1); $j >= 0; $j--) {
                    if ($nums[$j] > ($i - $j)) {
                        break;
                    } elseif ($j === 0) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}
// @lc code=end

$s = new Solution();
$res = $s->canJump([0, 1]);
var_dump($res);
