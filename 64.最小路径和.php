<?php
/*
 * @lc app=leetcode.cn id=64 lang=php
 *
 * [64] 最小路径和
 */

// @lc code=start
class Solution
{
    /**
     * @param int[][] $grid
     * @return int
     */
    function minPathSum($grid)
    {
        $result = $grid;
        // 计算从顶点到列每一步需要的步长
        for ($i = 1; $i < count($result); $i++) {
            $result[$i][0] += $result[$i - 1][0];
        }
        // 计算从顶点到行每一步需要的步长
        for ($i = 1; $i < count($result[0]); $i++) {
            $result[0][$i] += $result[0][$i - 1];
        }

        // 从(1,1)的位置向右或下做决策
        for ($i = 1; $i < count($result); $i++) {
            for ($j = 1; $j < count($result[0]); $j++) {
                // 做决策
                $result[$i][$j] += min($result[$i - 1][$j], $result[$i][$j - 1]);
            }
        }
        return $result[count($result) - 1][count($result[0]) - 1];
    }
}

class Solution1
{

    public $result = PHP_INT_MAX;

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid)
    {
        $this->dfs($grid, $grid[0][0], 0, 0);
        return $this->result;
    }

    public function dfs($grid, $sum, $x, $y)
    {
        if (
            $x === (count($grid) - 1)
            && $y === (count($grid[0]) - 1)
        ) {
            $this->result = min($this->result, $sum);
            return;
        }
        // 下，右
        $direction = [[1, 0], [0, 1]];
        for ($i = 0; $i < 2; $i++) {
            $new_x = $direction[$i][0] + $x;
            $new_y = $direction[$i][1] + $y;
            if (!$this->isValid($new_x, $new_y, $grid)) {
                continue;
            }
            $sum += $grid[$new_x][$new_y];
            $this->dfs($grid, $sum, $new_x, $new_y);
            $sum -= $grid[$new_x][$new_y];
        }
    }

    public function isValid($x, $y, $grid)
    {
        $x_length = count($grid);
        $y_length = count($grid[0]);
        if ($x >= $x_length || $x < 0) {
            return false;
        }
        if ($y >= $y_length || $y < 0) {
            return false;
        }
        return true;
    }
}
// @lc code=end

$s = new Solution();
$res = $s->minPathSum([
    [1, 3, 1],
    [1, 5, 1],
    [4, 2, 1]
]);

var_dump($res);
