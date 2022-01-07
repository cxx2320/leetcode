<?php
/*
 * @lc app=leetcode.cn id=22 lang=php
 *
 * [22] 括号生成
 */

// @lc code=start

class Solution
{
    public $result;

    /**
     * @param int $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $this->dfs($n, '', 0, 0);
        return $this->result;
    }

    /**
     * @param int $n
     * @param string $str
     * @param int $left 放入左括号的次数
     * @param int $right 放入右括号的次数
     * @return void
     */
    public function dfs($n, $str, $left, $right)
    {
        // 如果左右超出直接退出
        if ($left > $n || $right > $n) {
            return;
        }
        if ($left === $n && $right === $n) {
            $this->result[] = $str;
            return;
        }

        // 左括号数量一直要大于右括号数量，才能放入右括号
        if ($right < $left) {
            $this->dfs($n, $str . ')', $left, $right + 1);
        }
        $this->dfs($n, $str . '(', $left + 1, $right);
    }
}

// @lc code=end
$s = new Solution();
$res = $s->generateParenthesis(5);
var_dump($res);
