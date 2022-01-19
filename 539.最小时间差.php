<?php
/*
 * @lc app=leetcode.cn id=539 lang=php
 *
 * [539] 最小时间差
 */

// @lc code=start
class Solution
{

    /**
     * @param String[] $timePoints
     * @return Integer
     */
    function findMinDifference($timePoints)
    {
        if(count($timePoints) > 1440){
            return 0;
        }
        $arr = [];
        for ($i = 0; $i < count($timePoints); $i++) {
            [$hour, $minute] = explode(':', $timePoints[$i]);
            $arr[] = intval($hour * 60 + $minute);
        }
        sort($arr);
        $min = 1440;
        for ($i = 1; $i < count($arr); $i++) {
            $min = min($min, $arr[$i] - $arr[$i - 1]);
        }
        return min($min, $arr[0] + 1440 - $arr[count($arr) - 1]);
    }
}
// @lc code=end

$s = new Solution();
$result = $s->findMinDifference(["00:00", "23:59"]);
var_dump($result);
