<?php
/*
 * @lc app=leetcode.cn id=51 lang=php
 *
 * [51] N 皇后
 */

// @lc code=start
class Solution
{

    private $res = [];

    private $n = 0;
    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n)
    {
        if ($n < 1) {
            return [];
        }
        $this->n = $n;
        $board = $this->getBoard();
        $this->dfs($board, 0);
        return $this->res;
    }

    private function dfs(&$board, $x)
    {
        if ($x === $this->n) {
            // 找到了一个解，进行记录
            $this->res[] = $board;
            return;
        }
        for ($y = 0; $y < $this->n; $y++) {
            if (!$this->isInThe($board, $x, $y)) {
                continue;
            }
            $board[$x][$y] = 'Q';
            $this->dfs($board, $x + 1);
            $board[$x][$y] = '.';
        }
    }

    /**
     * 指定坐标是否可以放入Q
     *
     * @param string[] $board
     * @param int $x
     * @param int $y
     * @return boolean
     */
    private function isInThe(&$board, $x, $y)
    {
        $n = $this->n;
        // 上下是否有Q
        for ($i = 0; $i < $n; $i++) {
            if ($board[$i][$y] === 'Q') {
                return false;
            }
        }

        // 右斜下
        for ($i = 0; $i < $n; $i++) {
            $newx = $x + $i;
            $newy = $y + $i;

            if (!$this->is($newx, $newy, $n)) {
                break;
            }
            if ($board[$newx][$newy] === 'Q') {
                return false;
            }
        }

        // 左斜上
        for ($i = 0; $i < $n; $i++) {
            $newx = $x - $i;
            $newy = $y - $i;
            if (!$this->is($newx, $newy, $n)) {
                break;
            }
            if ($board[$newx][$newy] === 'Q') {
                return false;
            }
        }

        // 右斜上
        for ($i = 0; $i < $n; $i++) {
            $newx = $x - $i;
            $newy = $y + $i;
            if (!$this->is($newx, $newy, $n)) {
                break;
            }
            if ($board[$newx][$newy] === 'Q') {
                return false;
            }
        }

        // 左斜下
        for ($i = 0; $i < $n; $i++) {
            $newx = $x + $i;
            $newy = $y - $i;
            if (!$this->is($newx, $newy, $n)) {
                break;
            }
            if ($board[$newx][$newy] === 'Q') {
                return false;
            }
        }

        return true;
    }

    /**
     * 判断坐标是否越界
     *
     * @param int $x
     * @param int $y
     * @return boolean
     */
    private function is($x, $y)
    {
        return $x >= 0 && $x < $this->n && $y >= 0 && $y < $this->n;
    }

    /**
     * 获取一个棋盘
     *
     * @return string[]
     */
    private function getBoard()
    {
        $board = [];
        for ($i = 0; $i < $this->n; $i++) {
            $board[$i] = str_repeat('.', $this->n);
        }
        return $board;
    }
}
// @lc code=end

$s = new Solution();
$res = $s->solveNQueens(6);
var_dump($res);
