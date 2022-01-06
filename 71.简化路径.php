<?php
/*
 * @lc app=leetcode.cn id=71 lang=php
 *
 * [71] 简化路径
 */

// @lc code=start
class Solution
{

    /**
     * @param String $path
     * @return String
     */
    function simplifyPath($path)
    {
        $arr = explode('/', $path);
        $stack = new SplStack();
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] === '.') {
                continue;
            }
            if ($arr[$i] === '') {
                continue;
            }
            if ($arr[$i] === '..') {
                if (!$stack->isEmpty()) {
                    $stack->pop();
                }
            } else {
                $stack->push($arr[$i]);
            }
        }
        if ($stack->isEmpty()) {
            return '/';
        }
        $new_path = '';
        while (!$stack->isEmpty()) {
            $new_path = '/' . $stack->pop() . $new_path;
        }
        return $new_path;
    }
}
// @lc code=end

$s = new Solution();
$result = $s->simplifyPath('/a//b////c/d//././/..');
var_dump($result);
