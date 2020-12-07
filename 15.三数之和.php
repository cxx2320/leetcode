<?php
/*
 * @lc app=leetcode.cn id=15 lang=php
 *
 * [15] 三数之和
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $result = [];
        $count = count($nums);
        if ($count < 3) {
            return [];
        }
        if ($count === 3) {
            return array_sum($nums) === 0 ? [$nums] : [];
        }

        for ($i = 0; $i < $count - 2; $i++) {
            $start = $i + 1;
            $end = $count - 1;
            if ($i === 0 || $nums[$i] !== $nums[$i - 1]) {
                while ($start < $end) {
                    $sum = $nums[$i] + $nums[$start] + $nums[$end];
                    switch ($sum <=> 0) {
                        case 0:
                            $result[] = [$nums[$i], $nums[$start], $nums[$end]];
                            $start++;
                            $end--;
                            while ($start < $end && $nums[$start] === $nums[$start - 1]) {
                                $start++;
                            }
                            while ($start < $end && $nums[$end] === $nums[$end + 1]) {
                                $end--;
                            }
                            break;
                        case 1:
                            $end--;
                            break;
                        case -1:
                            $start++;
                            break;
                    }
                }
            }
        }
        return $result;
    }
}
// @lc code=end
