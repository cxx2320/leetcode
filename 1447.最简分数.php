<?php
/*
 * @lc app=leetcode.cn id=1447 lang=php
 *
 * [1447] 最简分数
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $n
     * @return String[]
     */
    function simplifiedFractions($n)
    {
        $result = [];
        for ($i = 1; $i < $n; $i++) {
            for ($j = $i + 1; $j <= $n; $j++) {
                if ($this->gcd($i, $j) !== 1) {
                    continue;
                }
                $result[] = "$i/$j";
            }
        }
        return $result;
    }

    function gcd($a,$b) {
        return ($a % $b) ? $this->gcd($b,$a % $b) : $b;
    }
}
// @lc code=end

$s = new Solution();
$result = $s->simplifiedFractions(4);

var_dump($result);
