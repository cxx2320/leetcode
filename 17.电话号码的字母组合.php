<?php
/*
 * @lc app=leetcode.cn id=17 lang=php
 *
 * [17] 电话号码的字母组合
 */

// @lc code=start
class Solution
{

    public $res = [];
    public $map = [
        '',
        '',
        'abc',
        'def',
        'ghi',
        'jkl',
        'mno',
        'pqrs',
        'tuv',
        'wxyz'
    ];
    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits)
    {
        if(empty($digits)){
            return [];
        }
        $this->find($digits, 0, '');
        return $this->res;
    }

    function find($digits, $index, $s)
    {
        if ($index === strlen($digits)) {
            $this->res[] = $s;
            return;
        }
        $c = $this->map[$digits[$index]];
        for ($i = 0; $i < strlen($c); $i++) {
            $this->find($digits, $index + 1, $s . $c[$i]);
        }
    }
}
// @lc code=end
