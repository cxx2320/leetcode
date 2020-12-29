<?php
/*
 * @lc app=leetcode.cn id=37 lang=php
 *
 * [37] 解数独
 */

// @lc code=start
class Solution
{
    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board)
    {
        // 从0行0列开始执行
        $this->dfs($board, 0, 0);
    }

    public function dfs(&$board, $x, $y)
    {
        // 如果当前行的位置到头了，就换下一行继续执行
        if ($y === 9) { 
            return $this->dfs($board, $x + 1, 0);
        }
        // 如果8行都执行完了，终止执行
        if ($x === 9) { 
            return true;
        }
        // 当前有数字直接跳过执行
        if ($board[$x][$y] !== '.') { 
            return $this->dfs($board, $x, $y + 1);
        }
        // 尝试放入数字
        for ($i = 1; $i <= 9; $i++) {
            // 要选择的数字是否合法
            if (!$this->isValid($board, $x, $y, $i)) {
                continue;
            }
            $board[$x][$y] = (string) $i;
            if ($this->dfs($board, $x, $y + 1)) {
                return true;
            }
            // 回溯
            $board[$x][$y] = '.';
        }
        // 没有合适的解
        return false;
    }

    /**
     * 判断在当前坐标放入数字是否合法
     *
     * @param String[][] $board
     * @param int $x
     * @param int $y
     * @param string $num
     * @return boolean
     */
    function isValid(&$board, $x, $y, $num)
    {
        $num = (string) $num;
        for ($i = 0; $i < 9; $i++) {
            if ($board[$x][$i] === $num) {
                return false;
            }
            if ($board[$i][$y] === $num) {
                return false;
            }
        }

        // 3 x 3格子判断
        $scope = [
            [0, 2], [0, 2], [0, 2],
            [3, 5], [3, 5], [3, 5],
            [6, 8], [6, 8], [6, 8],
        ];
        for ($i = $scope[$x][0]; $i <= $scope[$x][1]; $i++) {
            for ($j = $scope[$y][0]; $j <= $scope[$y][1]; $j++) {
                if ($board[$i][$j] === $num) {
                    return false;
                }
            }
        }
        return true;
    }
}
// @lc code=end

$b = [["5", "3", ".", ".", "7", ".", ".", ".", "."], ["6", ".", ".", "1", "9", "5", ".", ".", "."], [".", "9", "8", ".", ".", ".", ".", "6", "."], ["8", ".", ".", ".", "6", ".", ".", ".", "3"], ["4", ".", ".", "8", ".", "3", ".", ".", "1"], ["7", ".", ".", ".", "2", ".", ".", ".", "6"], [".", "6", ".", ".", ".", ".", "2", "8", "."], [".", ".", ".", "4", "1", "9", ".", ".", "5"], [".", ".", ".", ".", "8", ".", ".", "7", "9"]];
$s = new Solution();
$s->solveSudoku($b);
var_dump($b);
