<?php
/*
 * @lc app=leetcode.cn id=219 lang=php
 *
 * [219] 存在重复元素 II
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k)
    {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($map[$nums[$i]])) {
                if (($i - $map[$nums[$i]]) <= $k) {
                    return true;
                }
            }
            $map[$nums[$i]] = $i;
        }
        return false;
    }
}
// @lc code=end

$s = new Solution();
$res = $s->containsNearbyDuplicate([1, 2, 3, 1, 2, 3], 2);
var_dump($res);
