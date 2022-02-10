
<?php
/*
 * @lc app=leetcode.cn id=11 lang=php
 *
 * [11] 盛最多水的容器
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $result = 0;
        $left_index = 0;
        $right_index = count($height) - 1;
        while ($right_index > $left_index) {
            $current = min($height[$left_index], $height[$right_index]) * ($right_index - $left_index);
            $result = max($result, $current);
            if ($height[$left_index] >= $height[$right_index]) {
                $tmp = $height[$right_index];
                do {
                    $right_index--;
                } while ($tmp > $height[$right_index]);
            } else {
                $tmp = $height[$left_index];
                do {
                    $left_index++;
                } while ($tmp > $height[$left_index]);
            }
        }
        return $result;
    }
}
// @lc code=end

$s = new Solution();
// 200
$res = $s->maxArea([1, 8, 100, 2, 100, 4, 8, 3, 7]);
var_dump($res);
