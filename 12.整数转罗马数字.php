<?php
/*
 * @lc app=leetcode.cn id=12 lang=php
 *
 * [12] 整数转罗马数字
 */

// @lc code=start
class Solution
{

    /**
     * @param int $num
     * @return String
     */
    function intToRoman($num)
    {
        $arr1 = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
        $arr2 = ['M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I'];
        $res = '';
        for ($i = 0; $i < 13; $i++) {
            if ($num < $arr1[$i]) {
                continue;
            }
            $time = intval($num / $arr1[$i]);
            $res .= str_repeat($arr2[$i], $time);
            $num = $num % $arr1[$i];
        }
        return $res;
    }
}
// @lc code=end
