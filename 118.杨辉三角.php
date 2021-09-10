<?php
/*
 * @lc app=leetcode.cn id=118 lang=php
 *
 * [118] 杨辉三角
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows)
    {
        $res = [[1]];
        $pre = [1];
        for ($i = 1; $i < $numRows; $i++) {
            // 不处理左边
            $temp[0] = 1;
            for ($j = 1; $j < $i; $j++) {
                $temp[$j] = ($pre[$j - 1]) + ($pre[$j]);
            }
            // 不处理右边
            $temp[] = 1;
            // 记录结果和上一个的值
            [$pre, $res[]] = [$temp, $temp];
        }
        return $res;
    }
}
// @lc code=end

$s = new Solution();
$res = $s->generate(5);
var_dump($res);
