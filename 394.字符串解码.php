<?php
/*
 * @lc app=leetcode.cn id=394 lang=php
 *
 * [394] 字符串解码
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function decodeString($s)
    {
        [$stack, $multi, $res] = [[], 0, ''];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] === '[') {
                array_push($stack, [$multi, $res]);
                [$multi, $res] = [0, ''];
            } elseif ($s[$i] === ']') {
                [$c_multi, $last_res] = array_pop($stack);
                $res = $last_res . (str_repeat($res, $c_multi));
            } elseif (is_numeric($s[$i]) && 0 <= $s[$i] && $s[$i] <= 9) {
                $multi = $multi * 10 + intval($s[$i]);
            } else {
                $res = $res . $s[$i];
            }
        }
        return $res;
    }
}
// @lc code=end
