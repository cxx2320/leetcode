<?php
/*
 * @lc app=leetcode.cn id=4 lang=php
 *
 * [4] 寻找两个正序数组的中位数
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $arr = $nums1;
        foreach ($nums2 as $value) {
            $arr[] =  $value;
        }
        array_multisort($arr);
        $length = count($arr);
        if ($length % 2 == 1) {
            return $arr[floor($length / 2)];
        } else {
            $l1 = floor($length / 2);
            $l2 = $l1 - 1;
            return ($arr[$l1] + $arr[$l2]) / 2;
        }
    }
}
// @lc code=end
