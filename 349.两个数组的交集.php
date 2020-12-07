<?php
/*
 * @lc app=leetcode.cn id=349 lang=php
 *
 * [349] 两个数组的交集
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2) {
        $result = [];
        $map = array_flip($nums2);
        $nums1_map = array_flip($nums1);
        foreach ($nums1_map as $k => $value) {
            if(isset($map[$k])){
                $result[] = $k;
            }
        }
        return $result;
    }
}
// @lc code=end

