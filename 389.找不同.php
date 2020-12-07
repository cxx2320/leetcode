<?php
/*
 * @lc app=leetcode.cn id=389 lang=php
 *
 * [389] 找不同
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function findTheDifference($s, $t)
    {
        $s_table = [];
        $t_table = [];
        for ($i = 0; $i < strlen($t); $i++) {
            $s_table[$s[$i] ?? 'cxx'] = isset($s_table[$s[$i]]) ? isset($s_table[$s[$i]]) + 1 : 1;
            $t_table[$t[$i]] = isset($t_table[$t[$i]]) ? isset($t_table[$t[$i]]) + 1 : 1;
        }
        var_dump($s_table, $t_table);exit;
        foreach ($t_table as $k => $v) {
            if (!isset($s_table[$k])) {
                return $k;
            } elseif ($v > $s_table[$k]) {
                return $k;
            }
        }
        return '';
    }
}
// @lc code=end
