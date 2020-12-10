<?php
/*
 * @lc app=leetcode.cn id=131 lang=php
 *
 * [131] 分割回文串
 */

// @lc code=start
class Solution
{

    public $res = [];

    public $map = [];

    public $s_length = 0;

    public $arr = [];
    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s)
    {
        $this->s_length = strlen($s);
        if ($this->s_length < 1) {
            return [];
        }
        $this->find($s, 0, []);
        return $this->res;
    }

    function find($s, $start)
    {
        if ($start >= $this->s_length) {
            $this->res[] = $this->arr;
            return;
        }
        $string = '';
        for ($i = $start; $i < $this->s_length; $i++) {
            $string .= $s[$i];
            // 如果是回文字符串
            if ($this->is($string)) {
                array_push($this->arr, $string);
                $this->find($s, $i + 1);
                array_pop($this->arr);
            }
        }
        return;
    }

    function is(string $s): bool
    {
        if (isset($this->map[$s])) {
            return true;
        }
        if (strlen($s) <= 1) {
            $this->map[$s] = true;
            return true;
        }
        $left = 0;
        $right = strlen($s) - 1;
        while ($left < $right) {
            if ($s[$left] !== $s[$right]) {
                return false;
            }
            $left++;
            $right--;
        }
        $this->map[$s] = true;
        return true;
    }
}
// @lc code=end
