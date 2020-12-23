<?php
/*
 * @lc app=leetcode.cn id=150 lang=php
 *
 * [150] 逆波兰表达式求值
 */

// @lc code=start
class Solution
{

    /**
     * 这道题主要是对逆波兰表达式的定义搞清楚
     * @link https://baike.baidu.com/item/%E9%80%86%E6%B3%A2%E5%85%B0%E8%A1%A8%E8%BE%BE%E5%BC%8F/9841727?fr=aladdin
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens)
    {
        $q = new SplStack();
        $map = [
            '+' => 'bcadd',
            '-' => 'bcsub',
            '*' => 'bcmul',
            '/' => 'bcdiv',
        ];
        for ($i = 0; $i < count($tokens); $i++) {
            $s = $tokens[$i];
            if(isset($map[$s])){
                $num1 = $q->pop();
                $num2 = $q->pop();
                $fun = $map[$s];
                // 注意操作数顺序
                $q->push($fun($num2,$num1));
            }else{
                $q->push(intval($s));
            }
        }
        return $q->top();
    }
}
// @lc code=end
