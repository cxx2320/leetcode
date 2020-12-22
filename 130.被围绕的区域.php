<?php
/*
 * @lc app=leetcode.cn id=130 lang=php
 *
 * [130] 被围绕的区域
 */

// @lc code=start
class Solution
{

    public $used = []; // 保存边界O的数组

    public $x = 0;

    public $y = 0;

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board)
    {
        $this->y = count($board);
        if($this->y === 0){
            return;
        }
        $this->x = count($board[0]);
        if($this->x === 0){
            return;
        }
        // 遍历边界记录下值O的和与其相连其他O的位置信息

        // 上
        for ($i = 0; $i < $this->x; $i++) {
            $this->dfs($board, $i, 0);
        }

        // 右
        for ($i = 1; $i < $this->y; $i++) { // 这次遍历忽略了上此遍历的交界处
            $this->dfs($board, $this->x - 1, $i);
        }

        // 下
        for ($i = 0; $i < $this->x - 1; $i++) { // 这次遍历忽略了上此遍历的交界处
            $this->dfs($board, $i, $this->y - 1);
        }

        // 左
        for ($i = 1; $i < $this->y - 1; $i++) { // 这次遍历忽略了上此遍历的交界处
            $this->dfs($board, 0, $i);
        }
        // 再遍历一下$board 对没有记录的O进行修改
        for ($y = 1; $y < $this->y - 1; $y++) { // 这里无需进行第一行和最后一行的循环
            for ($x = 1; $x < $this->x - 1; $x++) { // 这里忽略第一列和最后一列的循环
                if (!isset($this->used[$y][$x]) && $board[$y][$x] === 'O') {
                    $board[$y][$x] = 'X';
                }
            }
        }
    }

    function dfs(&$board, $x, $y)
    {
        if ($this->isExceed($y, $x) && $board[$y][$x] === 'O' && !isset($this->used[$y][$x])) {
            $this->used[$y][$x] = true;
            $this->dfs($board, $x + 1, $y);
            $this->dfs($board, $x - 1, $y);
            $this->dfs($board, $x, $y + 1);
            $this->dfs($board, $x, $y - 1);
        }
    }

    /**
     * 坐标是否越界
     *
     * @param int $y
     * @param int $x
     * @return boolean
     */
    function isExceed($y, $x)
    {
        return $y >= 0 && $y < $this->y && $x >= 0 && $x < $this->x;
    }
}
// @lc code=end

// Testcase
$Testcase = [
    ["X", "O", "X", "O", "X", "O"],
    ["O", "X", "O", "X", "O", "X"],
    ["X", "O", "X", "O", "X", "O"],
    ["O", "X", "O", "X", "O", "X"]
];

// Answer
$Answer = [
    ["X", "O", "X", "O", "X", "O"],
    ["O", "X", "X", "X", "O", "X"],
    ["X", "X", "X", "X", "X", "O"],
    ["O", "X", "O", "X", "O", "X"]
];

// Expected Answer
$Expected = [
    ["X", "O", "X", "O", "X", "O"],
    ["O", "X", "X", "X", "X", "X"],
    ["X", "X", "X", "X", "X", "O"],
    ["O", "X", "O", "X", "O", "X"]
];
