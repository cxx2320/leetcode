<?php
/*
 * @lc app=leetcode.cn id=455 lang=php
 *
 * [455] 分发饼干
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s)
    {
        rsort($s);
        rsort($g);
        [$si, $gi, $res] = [0, 0, 0];
        while ($si < count($s) && $gi < count($g)) {
            if ($s[$si] >= $g[$gi]) {
                $si++;
                $gi++;
                $res++;
            } else {
                $gi++;
            }
        }
        return $res;
    }
}
// @lc code=end
