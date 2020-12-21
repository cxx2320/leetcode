<?php
/*
 * @lc app=leetcode.cn id=200 lang=php
 *
 * [200] 岛屿数量
 */

// @lc code=start
class Solution
{

    public $used = [];

    public $m = 0;

    public $n = 0;

    public $d = [[0, 1], [0, -1], [1, 0], [-1, 0]];

    public $res = 0;

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $this->m = count($grid);
        $this->n = count($grid[0]);
        for ($m = 0; $m < $this->m; $m++) {
            for ($n = 0; $n < $this->n; $n++) {
                if (
                    !isset($this->used[$m][$n]) &&
                    $grid[$m][$n] === '1'
                ) {
                    $this->res++; // 岛屿数量+1
                    $this->dfs($grid, $m, $n);
                }
            }
        }

        return $this->res;
    }

    public function dfs(array &$grid, $m, $n)
    {
        for ($i = 0; $i < 4; $i++) {
            $newm = $m + $this->d[$i][0];
            $newn = $n + $this->d[$i][1];
            $this->used[$m][$n] = true;
            if (
                !isset($this->used[$newm][$newn]) &&
                $this->is($newm, $newn) &&
                $grid[$m][$n] === '1'
            ) {
                $this->dfs($grid, $newm, $newn);
            }
        }
    }

    /**
     * 给定的坐标是否越界
     *
     * @param int $m
     * @param int $n
     * @return boolean
     */
    function is($m, $n)
    {
        return $m >= 0 && $m < $this->m && $n >= 0 && $n < $this->n;
    }
}
// @lc code=end