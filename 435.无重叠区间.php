<?php
/*
 * @lc app=leetcode.cn id=435 lang=php
 *
 * [435] 无重叠区间
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals)
    {
        $res = 999;
        for ($i = 0; $i < count($intervals); $i++) {
            $max = $intervals[$i][1];
            $res1 = 0;
            for ($j = 0; $j < count($intervals); $j++) {
                if ($i === $j) {
                    continue;
                }
                if ($intervals[$j][0] < $max) {
                    $res1++;
                } else {
                    $max = max([$max, $intervals[$j][1]]);
                }
            }
            $res = min([$res1, $res]);
        }
        return $res;
    }
}
// @lc code=end
