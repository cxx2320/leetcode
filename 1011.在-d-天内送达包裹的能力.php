<?php
/*
 * @lc app=leetcode.cn id=1011 lang=php
 *
 * [1011] 在 D 天内送达包裹的能力
 */

// @lc code=start
class Solution
{
    /**
     * @param Integer[] $weights
     * @param Integer $D
     * @return Integer
     */
    function shipWithinDays($weights, $D)
    {
        // 由于每个货物不能分拆，最小值为包裹中的最大包裹数
        $left = max($weights);
        // 最大值为包裹数量的总和
        $right = array_sum($weights);
        while ($left <= $right) {
            $mid = floor(($left + $right) / 2);
            if ($this->isDone($weights, $mid, $D)) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return $left;
    }

    /**
     * 尝试以$m数放入（货物必须按照给定的顺序装运）
     *
     * @param array $weights
     * @param int $m
     * @param int $D
     * @return boolean
     */
    function isDone(&$weights, $m, $D)
    {
        // 次数初始化为1
        $time = 1;
        $tmp_num = $m;
        for ($i = 0; $i < count($weights); $i++) {
            // 当累计减少到无法放入当前包裹时，次数加一，$tmp_num 初始为传入值$m
            if ($tmp_num < $weights[$i]) {
                $time += 1;
                $tmp_num = $m;
            }
            $tmp_num -= $weights[$i];
        }
        return $time <= $D;
    }
}
// @lc code=end

$s = new Solution();
$weights = [1,2,3,4,5,6,7,8,9,10];
$D = 5;
$m = 15;
var_dump($s->isDone($weights, $m, $D));
