<?php
/*
 * @lc app=leetcode.cn id=1598 lang=php
 *
 * [1598] 文件夹操作日志搜集器
 */

// @lc code=start
class Solution
{

    /**
     * @param String[] $logs
     * @return Integer
     */
    function minOperations($logs)
    {
        $result = 0;
        foreach ($logs as $value) {
            if ($value === './') {
                continue;
            }
            if ($value === '../') {
                if ($result !== 0) {
                    $result--;
                }
                continue;
            }
            $result++;
        }
        return $result;
    }
}
// @lc code=end
