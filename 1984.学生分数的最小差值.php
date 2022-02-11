<?php
/*
 * @lc app=leetcode.cn id=1984 lang=php
 *
 * [1984] 学生分数的最小差值
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $nums
     * @param int $k
     * @return int
     */
    function minimumDifference($nums, $k)
    {
        sort($nums);
        $left = 0;
        $right = $k - 1;
        $res = $nums[count($nums) - 1];
        while ($right < count($nums)) {
            $res = min($res, $nums[$right] - $nums[$left]);
            $left++;
            $right++;
        }
        return $res;
    }
}
// @lc code=end

$s = new Solution();
$result = $s->minimumDifference([9, 4, 1, 7], 2);
var_dump($result);
