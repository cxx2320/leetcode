<?php
/*
 * @lc app=leetcode.cn id=1614 lang=php
 *
 * [1614] 括号的最大嵌套深度
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function maxDepth($s)
    {
        $result = 0;
        $res = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] === '(') {
                $res++;
                $result = max($result, $res);
            } elseif ($s[$i] === ')') {
                $res--;
            }
        }
        return $result;
    }
}
// @lc code=end
$s = new Solution();
$result = $s->maxDepth("(1+(2*3)+((8)/4))+1");
var_dump($result);
