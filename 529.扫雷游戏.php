<?php
/*
 * @lc app=leetcode.cn id=529 lang=php
 *
 * [529] 扫雷游戏
 */

// @lc code=start
class Solution
{
    public $x_length = 0;

    public $y_length = 0;

    public $board;

    /**
     * @param String[][] $board
     * @param Integer[] $click
     * @return String[][]
     */
    function updateBoard($board, $click)
    {
        $this->x_length = count($board);
        $this->y_length = count($board[0]);
        $this->board = $board;
        [$x, $y] = $click;
        if ($this->board[$x][$y] === 'M') {
            $this->board[$x][$y] = 'X';
        } else {
            $this->bfs($x, $y);
        }
        return $this->board;
    }

    function bfs($x, $y)
    {
        $direction = [
            [-1, 0], [1, 0], [0, -1], [0, 1],
            [-1, -1], [-1, 1], [1, 1], [1, -1],
        ];
        $num = 0;
        for ($i = 0; $i < 8; $i++) {
            $new_x = $x + $direction[$i][0];
            $new_y = $y + $direction[$i][1];
            if (!$this->isValid($new_x, $new_y)) {
                continue;
            }
            if ($this->board[$new_x][$new_y] === 'M') {
                $num++;
            }
        }
        $this->board[$x][$y] = $num === 0 ? 'B' : (string)$num;
        if ($this->board[$x][$y] !== 'B') {
            return;
        }
        for ($i = 0; $i < 8; $i++) {
            $new_x = $x + $direction[$i][0];
            $new_y = $y + $direction[$i][1];
            if (!$this->isValid($new_x, $new_y) || $this->board[$new_x][$new_y] !== 'E') {
                continue;
            }
            $this->bfs($new_x, $new_y);
        }
    }

    /**
     * 判断位置是否合法
     *
     * @param int $x
     * @param int $y
     * @return boolean
     */
    function isValid($x, $y)
    {
        if ($x >= $this->x_length || $x < 0) {
            return false;
        }
        if ($y >= $this->y_length || $y < 0) {
            return false;
        }
        return true;
    }
}
// @lc code=end
$board = [
    ["E", "E", "E", "E", "E"],
    ["E", "E", "M", "E", "E"],
    ["E", "E", "E", "E", "E"],
    ["E", "E", "E", "E", "E"]
];

$click = [3, 0];
$s = new Solution();
$result = $s->updateBoard($board, $click);
var_export($result);
