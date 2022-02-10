<?php
/*
 * @lc app=leetcode.cn id=128 lang=php
 *
 * [128] 最长连续序列
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $nums
     * @return int
     */
    function longestConsecutive($nums)
    {
        if(empty($nums)){
            return 0;
        }
        sort($nums);
        $nums = array_values(array_unique($nums));
        $result = 1;
        $tmp_res = 1;
        for ($i = 1; $i < count($nums); $i++) {
            if (($nums[$i] - 1) === $nums[$i - 1]) {
                $tmp_res++;
                $result = max($result, $tmp_res);
            }else{
                $tmp_res = 1;
            }
        }
        return $result;
    }
}
// @lc code=end
$s = new Solution();
$res = $s->longestConsecutive([1, 2, 0, 1]);
var_dump($res);
