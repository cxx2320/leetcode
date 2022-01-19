<?php
/*
 * @lc app=leetcode.cn id=1716 lang=php
 *
 * [1716] 计算力扣银行的钱
 */

// @lc code=start
class Solution
{

    /**
     * @param int $n
     * @return int
     */
    function totalMoney($n)
    {
        $res = 0;
        $week = [1, 2, 3, 4, 5, 6, 7];
        $level = floor($n / 7);
        $end = $n % 7;
        for ($i = 0; $i < $end; $i++) {
            $res += ($week[$i] + $level);
        }
        for ($i = 0; $i < $level; $i++) {
            $res += 28 + ($i * 7);
        }
        return $res;
    }
}
// @lc code=end
class Solution1
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function totalMoney($n)
    {
        $week = [1, 2, 3, 4, 5, 6, 7];
        $res = 0;
        for ($i = 0; $i < $n; $i++) {
            $res += ($week[$i % 7] + floor($i / 7));
        }
        return $res;
    }
}

$s = new Solution();

$result = $s->totalMoney(20);
var_dump($result);
