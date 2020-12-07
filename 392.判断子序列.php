<?php
/*
 * @lc app=leetcode.cn id=392 lang=php
 *
 * [392] 判断子序列
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t)
    {
        if(empty($s)){
            return true;
        }
        [$si, $ti] = [0, 0];
        $res = false;
        while ($si < strlen($s)) {
            if ($s[$si] === $t[$ti]) {
                $si++;
                $ti++;
                $res = true;
            } else {
                if ($ti >= strlen($t)) {
                    return false;
                }
                $ti++;
            }
        }
        return $res;
    }
}
// @lc code=end
